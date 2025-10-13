# Contact Test 2

## 📖 概要
Laravelで作成したお問い合わせフォームアプリです。  
ユーザーがお問い合わせを送信し、管理者が内容を一覧・検索・削除できます。  
Laravel Fortifyを使用してログイン機能を実装しています。

---

## 🌐 開発環境URL
- http://localhost

---

## 🛠 使用技術
- PHP 8.x  
- Laravel 8.x  
- MySQL 8.x  
- Docker / docker-compose  

---

## ✨ 機能一覧
- ログイン・ログアウト機能（Fortify）
- お問い合わせ登録機能
- 管理者による一覧・検索・削除機能
- ページネーション・バリデーション機能

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

![ER図](./ER.png)



