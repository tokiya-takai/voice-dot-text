<template>
  <div class="container">
    <div class="input-area">
      <button v-on:click="switchLanguage()">{{ language }}</button>
      <button v-on:click="toggleStartStop()">{{ status }}</button>
      <textarea id="textarea"></textarea>
    </div>
    <div class="result-area">
      <button @click="setText()">決定</button>
      <textarea :value="text"></textarea>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      text: "",
      status: "録音",
      recognizing: false,
      recognition: null,
      language: 'ja',
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
      } else {
        this.recognition.start();
        this.recognizing = true;
        this.status = "停止";
      }
    },
    reset() {
      this.recognizing = false;
      this.status = "録音";
    },
    setText() {
      if(this.language == "ja"){
        var newText = textarea.value + '。' + '\n';
      } else {
        var newText = textarea.value + '.' + '\n';
      }
      this.text += newText;
      textarea.value = null;
      this.initialize();
    },
    switchLanguage() {
      if(this.language == "ja") {
        this.language = "en";
      } else {
        this.language = "ja";
      }
    },
  },
}
</script>