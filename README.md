# Contact Test 2

## 📖 概要
本アプリケーションは Laravel × Docker 環境で構築された**テスト提出用アプリケーション**です。  
商品一覧・登録・編集・削除・検索・並び替え・バリデーション機能を実装しています。  
また、Laravel Fortifyを導入し、**認証機能を拡張可能な構成**としています（ログイン・登録画面は仕様書に含まれないため未実装）。

---

## 🌐 開発環境 URL
- http://localhost

---

## 🛠 使用技術
- PHP 8.x  
- Laravel 8.x  
- MySQL 8.x  
- Docker / docker-compose  
- Laravel Fortify（導入済み／ログイン機能は未実装）

---

## ✨ 機能一覧
- 商品一覧表示・詳細表示  
- 商品登録（画像アップロード対応）  
- 商品編集・削除  
- 商品検索・並び替え  
- バリデーション機能  
- シーダーによるダミーデータ登録  
- ER図作成（VS Code + draw.io）  
- Laravel Fortify 導入（将来的に認証機能を追加可能な構成）

---

## ⚙️ 環境構築手順
```bash
git clone https://github.com/mikihope/contact-test2-final.git
cd contact-test2-final
docker compose up -d --build
docker compose exec php bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed

=======
🧩 ER図
<img width="562" height="161" alt="ER" src="https://github.com/user-attachments/assets/ca49c7cb-0fb4-4749-aeeb-898f9c4c204b" />


## 📍 動作確認URL一覧
| ページ名 | URL | 内容 |
|-----------|------|------|

=======
| トップページ | http://localhost | Laravel起動確認 |
| 商品一覧 | http://localhost/products | 商品一覧・検索・並び替え |
| 商品登録 | http://localhost/products/create | 新規登録フォーム（バリデーション確認） |



