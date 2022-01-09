# highlight

## Tech Stack
- Laravel 8.x
- PHP 8.x
- MySQL 8.0
- Nodejs (lts/fermium)
- Typescript
- React Hooks
- Inertia.js

## Prerequisites

- docker
- nvm(https://github.com/nvm-sh/nvm#installing-and-updating)のinstalling-and-updatingからインストールしてねー。

## Setup

0. [Prerequisites](#Prerequisites) にあるものをインストール

1. aliasの設定
```bash
echo "alias run='./Taskfile'" >> ~/.zshrc
```

2. WEBサーバを立ち上げ

```bash
# ↓ コマンドを実行するディレクトリを注意
[~] $ git clone git@github.com:Apro-yuto/highlight.git
[~] $ cd highlight

# .env ファイルを準備
[highlight] $ cp .env.example .env
[highlight] $ cp .env.example .env.testing
[highlight] $ php artisan key:generate

# .envと.env.testingの修正
## .env
> DB_DATABASE=laravel<br />
DB_USERNAME=deployer<br />
DB_PASSWORD=password

# .env.testing
> APP_KEY=(ここはenvファイルのをコピペしてください。)<br />
DB_DATABASE=laravel_testing<br />
DB_USERNAME=deployer<br />
DB_PASSWORD=password

# PHPパッケージをインストール
[highlight] $ run up
[highlight] $ run composer install
```
.env.testingを以下のように編集してください

> APP_KEY=(ここはenvファイルのをコピペしてください。)<br />
DB_DATABASE=laravel_testing<br />
DB_USERNAME=deployer<br />
DB_PASSWORD=password

```bash
[highlight] $ docker compose exec mysql bash
[highlight] $ mysql -p

## テスト用のDBを作成
mysql> CREATE DATABASE laravel_testing;
mysql> GRANT ALL ON laravel_testing.* TO deployer;

[highlight] $ run artisan migrate
[highlight] $ run artisan migrate --env=testing
```

### マイグレーションを実行

3. JSをセットアップ
```
`/etc/hosts` ファイルに追加
// /etc/hosts

127.0.0.1 host.docker.internal
```

```zsh
# node バージョンを統一するように
[highlight] $ nvm install && nvm use

# node パッケージをインストール
[highlight] $ npm ci

# vite を起動
[highlight] $ npm run dev
```

`npm run dev` に表示されたポート番号が `3000` 以外の場合は `.env` に設定：
```
// .env
VITE_PORT=3000
```

4. http://localhost:8080 にアクセス
