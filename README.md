# 🎭 PlaywrightPHP

> **⚠️ Aviso:** Projeto em construção! 🚧

Este projeto tem como objetivo demonstrar uma estrutura robusta de testes automatizados, simulando ações de usuário no site [QA Practice Hub](https://qapracticehub.com/) utilizando o [PlaywrightPHP](https://playwright-php.dev).

## 📋 Pré-requisitos

Certifique-se de ter as seguintes ferramentas instaladas em sua máquina:

- **PHP** 8.2 ou superior
- **Node.js** 20 ou superior *(necessário apenas para executar o servidor Playwright empacotado; você não precisará escrever código Node)*
- **Composer** (gerenciador de dependências do PHP)

Você pode verificar as versões instaladas executando os seguintes comandos no terminal:

```bash
php --version
node --version
composer --version
```

## 🚀 Instalação

1. Clone este repositório e acesse a pasta do projeto:
   ```bash
   git clone https://github.com/seu-usuario/PlaywrightPHP.git
   cd PlaywrightPHP
   ```

2. Instale as dependências do PHP via Composer:
   ```bash
   composer install
   ```

3. Instale os navegadores gerenciados pelo Playwright:

- **Para instalar apenas o Chromium (recomendado para começar):**
  ```bash
  vendor/bin/playwright-install chromium
  ```
  *Resultado esperado: A build gerenciada do Chromium será baixada para o cache de navegadores.*

- **Para instalar todos os três navegadores (Chromium, Firefox e WebKit) e rodar suítes cross-browser:**
  ```bash
  vendor/bin/playwright-install --browsers
  ```

- **Em uma máquina Linux nova ou em um ambiente de CI/CD (instala dependências do sistema operacional junto):**
  ```bash
  vendor/bin/playwright-install --with-deps chromium
  ```

## 💻 Uso

Para executar o programa principal e iniciar as simulações de teste, execute o seguinte comando na raiz do projeto:

```bash
php index.php
```

## 🏗️ Estrutura do Projeto (Planejada)

```text
PlaywrightPHP/
├── artifacts/          # Armazenamento de evidências (screenshots)
├── helpers/            # Funções auxiliares e utilitários reutilizáveis
├── POM/                # Page Object Model - Classes de abstração das páginas
├── testes/             # Scripts e suítes de testes automatizados
├── vendor/             # Dependências do Composer (gerado automaticamente)
├── .gitignore          # Arquivos e pastas ignorados pelo Git
├── composer.json       # Configuração e dependências do projeto PHP
├── composer.lock       # Versões exatas das dependências instaladas
├── index.php           # Ponto de entrada principal da execução
└── README.md           # Documentação do projeto
```

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](https://mit-license.org/) para mais detalhes.

---
Desenvolvido com 💜 e Playwright.
