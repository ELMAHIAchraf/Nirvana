<h1 align="center">Nirvana</h1>

<div align="center">
  <img src="https://github.com/user-attachments/assets/15f81713-45d2-484e-9ac1-c9681aad9d19" width="200px" alt="Logo">
</div>

## Description
Nirvana is an e-commerce site designed to provide an easy-to-use platform for customers. It offers a wide variety of products and ensures a secure and reliable online shopping experience.

The site includes features such as:

+   User registration and login
+   Product search and filtering
+   Detailed product display
+   Wishlist management
+   Shopping cart and order processing
+   Secure online payment with Stripe
+   Order tracking and email notifications
+   Product reviews and ratings

## Conception Diagrams (MERISE)
### MCD
![Nirvana_MCD](https://github.com/user-attachments/assets/76ca8b65-8e82-439e-9174-75027bbc765a)

### MLD
+	**Clients** (id_client, Fname, Lname, email, password, address)
+	**Articles** (id_article, name, description, category, price, color1, color2, color3)
+	**Id_commande** (id_commande)
+	**Id_ajout** (id_ajout)
+	**Commander** (#id_client, #id_article,#id_commande, date_commande, date_livraison, color, quantity, brief_review, review, rating, delivery, id_color, order_token, transaction_id)
+	**Ajouter** (#id_client, # id_article, #id_ajout,  quantity, color)
+	**Aimer** (#id_client, # id_article)
+	**Tokens_authentification** (token, creation_date, expiration_date, #id_client)
+	**Tokens_pw_recovery** (token, token_creation_time, #id_client)

## Technology Stack

### Frontend
+  ![html5](https://github.com/user-attachments/assets/7b531643-ae30-4a48-b3ff-a92c6b8b9f46)  **HTML**
+  ![css3](https://github.com/user-attachments/assets/ce29d602-f9fc-4e66-919f-0c5927cd85e3)   **CSS**
+  ![javascript](https://github.com/user-attachments/assets/47e17675-7023-48e9-8c0b-f4fd93d6d0be)  **JavaScript**
### Backend
+  <a href='https://github.com/shivamkapasia0' target="_blank"><img alt='PHP' style="width:250; height:100" src='https://img.shields.io/badge/PHP-100000?style=plastic&logo=PHP&logoColor=7b7fb5&labelColor=FFFFFF&color=7b7fb5'/></a>  **PHP**
+  <a href='https://github.com/shivamkapasia0' target="_blank"><img alt='stripe' src='https://img.shields.io/badge/Stripe-100000?style=plastic&logo=stripe&logoColor=6860ff&labelColor=FFFFFF&color=6860ff'/></a>  **Stripe**
### Database
+ <a href='https://github.com/shivamkapasia0' target="_blank"><img alt='mysql' src='https://img.shields.io/badge/MySQL-100000?style=plastic&logo=mysql&logoColor=08668e&labelColor=FFFFFF&color=e59208'/></a>  **MySQL**




## Project UIs
### Registration page
![UI1](https://github.com/user-attachments/assets/56d0f3b9-3c9e-4ee6-9d07-204916e6c7cd)
### Login page
![UI2](https://github.com/user-attachments/assets/38658ea1-ebbf-480f-881e-7dc9033993c3)
### Password reset page
![UI3](https://github.com/user-attachments/assets/b94386d8-27d3-4379-9b00-8cd63126dd1a)
![UI4](https://github.com/user-attachments/assets/443a6948-ace5-416b-8692-820f1de92421)
### Home page
![UI5](https://github.com/user-attachments/assets/1a3d3141-d6c9-4113-ad0d-78e2a8d68d56)
### Products search results page
![UI13](https://github.com/user-attachments/assets/57c6aeab-4152-4735-86a7-e3cdaf82353b)
### Product page
![UI6 (1)](https://github.com/user-attachments/assets/a889c616-5bd6-40d0-8308-0a7086a850e5)
### Reviews and ratings
![UI6 (2)](https://github.com/user-attachments/assets/67a7e9f8-52e9-47e9-ae74-1602b944e7e3)
### Wishlist
![UI7](https://github.com/user-attachments/assets/24537bf1-9b40-4346-8e76-e6abdda841d8)
### Cart
![UI8](https://github.com/user-attachments/assets/a0377d14-e621-4e76-b94d-2b055a9db26d)
### Payment page
![UI9](https://github.com/user-attachments/assets/48ed8e48-274f-4c3b-95ec-55aad644232f)
### Purchase confirmation PDF
![UI14](https://github.com/user-attachments/assets/0380661b-d5f7-4bc3-8686-8e47266c8794)
### Purchases page
![UI11](https://github.com/user-attachments/assets/c785f82b-1c0d-4343-9b7e-979cdd23d819)
### Order cancellation page
![UI15](https://github.com/user-attachments/assets/d90db6a4-dc75-4f27-b679-002f72dcf7b1)
### Account details update page
![UI16](https://github.com/user-attachments/assets/ffa6c8d3-d21c-4148-bb8a-7ea16ffc6d18)










