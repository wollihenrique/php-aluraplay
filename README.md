# 📺 Projeto CRUD de Vídeos em PHP

![image](https://github.com/user-attachments/assets/3565cf6f-c618-438f-91a1-fcef8ea5db1c)

Este é um projeto de estudo para criação de um sistema CRUD (Create, Read, Update, Delete) de vídeos utilizando PHP puro, com boas práticas de organização e arquitetura de software(Alura).

---

## 📚 O que aprendi neste projeto?

### 🧩 Aula 1 – Primeiros passos com CRUD em PHP

- Criamos nosso primeiro CRUD com PHP.
- Aprendemos a ler dados da requisição usando variáveis superglobais (`$_GET`, `$_POST`, etc.).
- Utilizamos `filter_input()` para validar e filtrar os dados recebidos.
- Enviamos cabeçalhos HTTP com a função `header()`.

---

### 🚦 Aula 2 – Introdução ao padrão Front Controller

- Conhecemos o padrão **Front Controller**, com um ponto único de entrada na aplicação.
- Implementamos lógica para incluir arquivos de acordo com a rota acessada.
- Movemos os arquivos públicos para a pasta `public/` por questões de segurança.
- Corrigimos pequenos erros como a verificação de ID ao editar um vídeo.

---

### 🧱 Aula 3 – Organização com orientação a objetos

- Reorganizamos o código solto em classes para melhor estruturação.
- Aplicamos padrões como **Repository** e **Entity**.
- Utilizamos recursos modernos do PHP 8.1 como `readonly` e *constructor property promotion*.
- Fizemos o **Front Controller** chamar os **Controllers** corretamente.

---

### 🗂️ Aula 4 – Separação com MVC (Model-View-Controller)

- Isolamos os arquivos de visualização (HTML) em uma pasta dedicada.
- Adotamos o padrão **MVC**, separando responsabilidades entre Model, View e Controller.
- Discutimos a importância da arquitetura e organização de uma aplicação web.
- Melhoramos nosso roteador para ser mais limpo e escalável.

---

## 🚀 Tecnologias e recursos usados

- PHP 8.1+
- Composer (autoloader)
- Padrões: MVC, Front Controller, Repository, Entity

---

## 👨‍💻 Objetivo

Este projeto tem como objetivo praticar os conceitos de desenvolvimento web com PHP puro, aplicando padrões de projeto e boas práticas de organização de código(PHP na Web: Alura).

---

## Feito por:
### Wallace Henrique Batista Santos
Este projeto é de uso educacional e não possui uma licença específica.
