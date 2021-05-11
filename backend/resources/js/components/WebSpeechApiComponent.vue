<template>
  <div class="container">
      <div class="input-area">
        <div class="flex-area">
          <textarea id="textarea"></textarea>
          <button v-on:click="toggleStartStop()" class="rec">{{ status }}</button>
          <button v-if="(status=='停止')||(textareaStatus == '0')" class="fake-enter">決定</button>
          <button v-else @click="setText()" class="enter">決定</button>
          <button v-on:click="switchLanguage()" class="lang">{{ language }}</button>
        </div>
      </div>
      <div class="result-area">
        <form action="/download" method="post">
          <input type="hidden" name="_token" v-bind:value="csrf">
          <textarea v-model="text" name="text_data"></textarea>
          <p>ダウンロードするファイルに名前をつける</p>
          <input type="text" name="rename" class="rename" placeholder="音声テキスト"><span>.txt</span>
          <input v-if="text == ''" value="ダウンロード" readonly="true" class="fake-download-btn">
          <input v-else type="submit" value="ダウンロード" class="download-btn">
        </form>
      </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      text: "",
      textareaStatus: "0",
      status: "録音",
      recognizing: false,
      recognition: null,
      language: '日本語',
    }
  },
  props:  {
    csrf: {
      type: String,
      required: true,
    }
  },
  created() {
    this.initialize();
  },
  methods: {
    initialize() {     
      var recognition = new webkitSpeechRecognition();
      recognition.continuous = true;
      this.reset();
      this.recognition = recognition;

      this.recognition.onresult = function (event) {
        for (var i = event.resultIndex; i < event.results.length; ++i) {
          if (event.results[i].isFinal) {
            textarea.value += event.results[i][0].transcript;
          }
        }
      }
    },
    toggleStartStop(){
      if (this.recognizing) {
        this.recognition.stop();
        this.reset();
        this.enterReset();
      } else {
        this.recognition.start();
        this.recognizing = true;
        this.status = "停止";
      }
    },
    enterReset() {
      if(textarea.value != "") {
        this.textareaStatus = "1";
      } else {
        this.textareaStatus = "0";
      }
    },
    reset() {
      this.recognizing = false;
      this.status = "録音";
    },
    setText() {
      if(textarea.value != ""){
        if(this.language == "日本語"){
          var newText = textarea.value + '。' + '\n';
        } else {
          var newText = textarea.value + '.' + '\n';
        }
        this.text += newText;
        textarea.value = null;
        this.initialize();
        this.enterReset();
      }
    },
    switchLanguage() {
      if(this.language == "日本語") {
        this.language = "英語";
      } else {
        this.language = "日本語";
      }
    },
  },
}
</script>