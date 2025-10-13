# Contact Test 2

## 📖 概要

Laravel で作成したお問い合わせフォームアプリです。  
ユーザーがお問い合わせを送信し、管理者が内容を一覧・検索・削除できます。  
Laravel Fortify を使用してログイン機能を実装しています。

---

## 🌐 開発環境 URL

-   http://localhost

---

## 🛠 使用技術

-   PHP 8.x
-   Laravel 8.x
-   MySQL 8.x
-   Docker / docker-compose

---

## ✨ 機能一覧

-   ログイン・ログアウト機能（Fortify）
-   お問い合わせ登録機能
-   管理者による一覧・検索・削除機能
-   ページネーション・バリデーション機能

---

## ⚙️ 環境構築手順

```bash
git clone https://github.com/mikihope/contact-test2.git
cd contact-test2
docker-compose up -d --build
docker-compose exec php bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed

## 🧩 ER図

![ER図](https://github.com/mikihope/contact-test2/commit/8781244d791d92b018dc00a1363b84a6ec150fb8)

## 📍 動作確認URL一覧

| ページ名 | URL | 内容 |
|-----------|------|------|
| トップページ | http://localhost | Laravel起動確認 |
| 商品一覧 | http://localhost/products | 商品の一覧を表示 |
| 商品登録 | http://localhost/products/create | 新しい商品を登録 |
| バリデーション確認 | http://localhost/products/create | 入力を空のまま送信して確認 |
| ログインページ（Fortify） | http://localhost/login | 認証機能の確認（必要に応じて） |




