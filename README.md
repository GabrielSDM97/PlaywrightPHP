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

2. Instale os navegadores gerenciados pelo Playwright:

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

Para executar os testes e salvar os logs dos testes executados, execute o seguinte comando no terminal na raiz do projeto:

```bash
composer test
```

- **Logs**: As saídas do terminal ficam salvas em `log.ansi` na raiz do projeto. 

- Utilize alguma extensão como [ANSI Colors](https://open-vsx.org/extension/iliazeus/vscode-ansi) para visualizar o `log.ansi` com cores, assim como é pelo terminal.

💡 **Dica: Execução em Modo Visual (Não-Headless)**  

Por padrão, os testes rodam em modo *headless* (sem interface gráfica, ideal para CI/CD). Se você deseja **assistir aos testes ocorrendo no navegador** em tempo real, abra o arquivo `app/index.php` e altere o parâmetro `headless` de `true` para `false` na configuração do `$context`:

```php
// Antes (Execução em segundo plano (terminal))
$context = Playwright::chromium(['headless' => true]);

// Depois (Execução visível no navegador (terminal + navegador))
$context = Playwright::chromium(['headless' => false]);
```

## 🏗️ Estrutura do Projeto (Planejada)

```text
PlaywrightPHP/
├── app/                # Scripts de execução de testes e registro de log
├── artifacts/          # Armazenamento de evidências (screenshots)
├── helpers/            # Funções auxiliares e utilitários reutilizáveis
├── POM/                # Page Object Model - Classes de abstração das páginas
├── testes/             # Scripts e suítes de testes automatizados
├── vendor/             # Dependências do Composer (gerado automaticamente)
├── .gitignore          # Arquivos e pastas ignorados pelo Git
├── composer.json       # Configuração e dependências do projeto PHP
├── composer.lock       # Versões exatas das dependências instaladas
├── log.ansi            # Arquivo de log. É criado durante os testes caso não exista.
└── README.md           # Documentação do projeto
```

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](https://mit-license.org/) para mais detalhes.

---
Desenvolvido com PlaywrightPHP.
