#Cronディレクトリの概要
1.12:00きっかりにクーロンシステムを作動させ、upload.phpを呼び出す。
2.upload.phpが主に利用するファイルで、その中に実行させたいクラスファイルを呼び出す。
3.upload.phpファイル内にroundomjsonchoice.phpがあり、それを呼び出すとconfig.phpファイルがコールされ、config.phpファイル内に記述されている設定ファイルを読み込み込む
4.config.phpには入力するファイルと、出力するファイルのパスが設定されており、そこで読み込みたいファイルを設定する。

#使い方

#update.php
これを実行すると、mainで読み込んでいるjsonviewファイルを更新することができる。
メインで実行するファイル。

#roundomjsonchoice.php
upload.phpに記載するファイルで、configファイル内に記述された、ファイルを読み込み出力先をランダムで変更する。

#config.php
入力先のファイルと、出力先のファイルを設定する。

##編集

config.php

```php
return [
    // ランダムで読み込むjsonファイル群(ディレクトリ)。
    'rondomjsonsdir' => "ランダムで読み込みたいファイル群があるディレクトリの設定。",
    // 出力先jsonファイル。今回の場合はmainviewread.jsonファイル。
    'readviewjson' => "出力先のメインのjsonファイル、これを読み込むことで、メインに表示されるファイルが変わる。"
];
```
