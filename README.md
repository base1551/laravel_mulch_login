## インストール方法

- cd プロジェクト名
- composer install
- npm install
- npm run dev
    - エラーが出た場合は、`npm update`等エラー内容に合わせて対応
- .env.example をコピーして .env ファイルを作成
- .envファイルの中の下記をご利用の環境に合わせて変更してください。

- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=laravel_umarche
- DB_USERNAME=umarche
- DB_PASSWORD=password123

### sail環境の場合
- `php artisan sail:install` 実行しsail環境を準備（DBを選択）
- `sail up -d` でDocker立ち上げ
- 必要であれば `sail artisan key:generate` など設定
- マイグレーション設定（ `sail artisan migrate:fresh --seed` などプロジェクトに応じてDB設定)


XAMPP/MAMPまたは他の開発環境でDBを起動した後に

`php artisan migrate:fresh --seed`もしくは
`sail artisan migrate:fresh --seed`

と実行してください。(データベーステーブルとダミーデータが追加されればOK)

最後に
`php artisan key:generate`もしくは
`sail artisan key:generate`
と入力してキーを生成後、

`php artisan serve`（sailの場合は不要）
で簡易サーバーを立ち上げ、表示確認してください。

