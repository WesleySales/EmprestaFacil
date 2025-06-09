# 📦 EmprestaFácil

**EmprestaFácil** é um sistema web simples de controle de empréstimos de equipamentos, desenvolvido em PHP com padrão MVC e arquitetura em camadas, utilizando Bootstrap para o frontend e PostgreSQL para persistência de dados.

---

## 🧠 Objetivo

O sistema permite que usuários visualizem os equipamentos disponíveis, realizem empréstimos e façam a gestão desses recursos de forma prática e organizada.

---

## 🚀 Funcionalidades

- Autenticação de usuários
- Tela inicial com menu lateral (Dashboard)
- Visualização de equipamentos disponíveis em formato de cards
- Empréstimo de equipamentos
- Logout seguro
- Sistema baseado em sessões
- Arquitetura MVC e camadas

---

## 🛠️ Tecnologias Utilizadas

- **PHP 8+**
- **PostgreSQL**
- **Bootstrap 5**
- **HTML5/CSS3**
- **Padrão MVC**
- **Paradigma Orientado a Objetos**

---

## 🔐 Tela de Login

A autenticação é realizada por email e senha. O sistema utiliza `password_hash` e `password_verify` para segurança das senhas armazenadas.

---

## 📦 Equipamentos

A listagem dos equipamentos é exibida em cards, com:

- Nome
- Quantidade disponível
- Botão de reserva

---

## ✅ Requisitos para rodar o projeto

- PHP 8.x instalado
- PostgreSQL instalado e configurado
- Servidor local (XAMPP, WAMP, etc)
- Composer (opcional, se quiser evoluir o projeto futuramente)

---

## ⚙️ Como rodar o projeto localmente

1. Clone este repositório:
   ```bash
   git clone https://github.com/seu-usuario/EmprestaFacil.git

