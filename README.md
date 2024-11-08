# PHP Library Admin

![Home Page](./public/assets/home.png)

## Sobre o Projeto

**PHP Library Admin** é um sistema de gerenciamento de biblioteca desenvolvido para fins de estudo e prática em PHP. O projeto permite gerenciar livros, incluindo o cadastro, atualização e aluguel, proporcionando uma experiência de CRUD completa em um ambiente de biblioteca.

## Funcionalidades

- **Cadastro de Livros:** Adicionar novos livros ao sistema com título, descrição, imagem de capa e quantidade.
- **Edição de Livros:** Atualizar informações dos livros existentes.
- **Aluguel de Livros:** Registrar o aluguel de livros, reduzindo automaticamente a quantidade disponível.
- **Gerenciamento de Estoque:** Manter o controle do estoque de livros disponíveis para aluguel.
- **Listagem de Aluguéis:** Visualizar os registros de livros alugados com informações detalhadas dos clientes.
- **Controle de Acesso:** Páginas importantes accessíveis somente por administradores autenticados

## Tecnologias Utilizadas

- **PHP**: Linguagem principal utilizada no backend do projeto.
- **MySQL**: Banco de dados relacional para armazenar informações sobre livros, clientes e aluguéis.
- **Bootstrap**: Framework CSS para estilização da interface, garantindo um design responsivo.
- **HTML** e **JavaScript**: Para estrutura e interatividade do frontend.

## Estrutura do Projeto

- `pages/`: Contém as páginas individuais para cadastro, edição, listagem de livros e aluguéis.
- `public/assets/`: Diretório para armazenamento de imagens, incluindo a imagem de visualização da home page.
- `db/config/`: Arquivo de configuração de conexão com o banco de dados.

## Como Executar o Projeto

1. **Clonar o Repositório**
   ```bash
   git clone https://github.com/seu-usuario/php-library-admin.git
   cd php-library-admin
   ```
