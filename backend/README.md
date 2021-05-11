<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<p align="center"><a href="https://github.com/tokiya-takai/live_with/tree/main/backend"><img src="https://user-images.githubusercontent.com/76773842/115679627-be19a500-a38d-11eb-9fe5-9f719a4e6920.png" width="400"><a></p>
<p align="center">
<img src="https://user-images.githubusercontent.com/76773842/115685325-1606da80-a393-11eb-9ec8-74fa975c6950.jpeg" width="50">
<img src="https://user-images.githubusercontent.com/76773842/115685404-28811400-a393-11eb-90c0-16ff513f7e45.jpeg" width="50">
<img src="https://user-images.githubusercontent.com/76773842/115685639-5ebe9380-a393-11eb-94a7-bf3f67ae75b2.png" width="50">
<img src="https://user-images.githubusercontent.com/76773842/115685719-71d16380-a393-11eb-920e-e0321e4b6a4f.png" width="50">
<img src="https://user-images.githubusercontent.com/76773842/115685830-8e6d9b80-a393-11eb-8fd5-0607c58187b3.png" width="50">
<img src="https://user-images.githubusercontent.com/76773842/115685885-9cbbb780-a393-11eb-86a4-4874da724ae5.png" width="50">
<img src="https://user-images.githubusercontent.com/76773842/115685967-b230e180-a393-11eb-981f-082fbc497a04.png" width="50">
</p>

## 概要

Web上で音声入力を行い、作成したテキストをテキストファイルとしてダウンロードすることができるアプリケーションです。<br />
パソコン入力が苦手な方など、タイピングでの入力に時間が掛かる場合にお使いいただけます。<br />
音声入力では、改行や句読点が入力されないため、自動で改行、句点(。)を入力する仕様になっています。<br />
日本語・英語の切り替えが可能で、英語の場合はピリオド(.)が付与されます。<br />

## 開発期間
・2021/05/06 実装開始<br />
・2021/05/09 機能実装後、デプロイ<br />
・2021/05/11 不具合を修正<br />

## 開発環境

MacOS Catalina 10.15.7<br />
PHP 7.4.19<br />
Laravel Framework 8.40.0<br />
Vue.js 2.6.12<br />
Docker 20.10.6<br />
Docker Compose 1.29.0<br />

## 機能

・Web Speech APIを使用した音声入力機能<br />
・Vue.jsを使用した表示切り替え機能<br />
・ファイル生成、ダウンロード及び削除機能<br />
・ダウンロードファイル名指定機能<br />
ダウンロードする際に、保存するファイルの名前を指定できます。指定しなければ、デフォルトの名前(音声テキスト.txt)でダウンロードされます。<br />

## 今後実装したい機能

・現時点では、最低限のテキストエリアやボタンなので、配置やデザインをアップデートしてユーザビリティを高めたい。<br />
【具体案】<br />
視覚的に認識しやすくするために、録音・停止ボタンなどにマークを追加したい。<br />

## 課題

### Heroku上でダウンロードができない不具合の修正
2021/05/11 完了

### ダウンロードボダンが押せない不具合の修正

通常使用では問題ないが、ブラウザバックなどのページ遷移が発生した場合、テキストエリアにテキストが残っていてもダウンロードボタンが押せない。<br />
改行するか、最後の改行を削除することで再度押せるようにはなるが、ユーザビリティを下げているため、改善したい。<br />
