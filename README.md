# Product Search Engine

## Visão Geral
Este é um mecanismo de busca de produtos que se conecta às páginas do Mercado Livre e Buscapé por meio de web scraping. O mecanismo permite aos usuários selecionar categorias (Mobile, Refrigerator, TV), escolher o site (Mercado Livre / Buscapé) e pesquisar produtos usando uma caixa de texto. Os resultados da pesquisa exibem fotos, descrições, categorias, preços e o site de onde as informações foram obtidas. Além disso, os resultados são armazenados em um banco de dados após a pesquisa e podem ser recuperados se a mesma pesquisa for repetida. Foi utilizado o pacote do Laravel chamado Goutte para realizar as raspagens de dados de forma fácil e eficiente.

## Estrutura de Pastas
O projeto é dividido em duas pastas principais:

### 1. `front`
   - Este diretório contém a parte do front-end do projeto, que é desenvolvido usando Vue.js.
   - Você encontrará os arquivos e componentes relacionados à interface do usuário aqui.
   
### 2. `back`
   - Este diretório contém a parte do back-end do projeto, que é desenvolvido usando o framework Laravel e WebScrapper Goutte
   - Aqui estão os controladores, modelos e rotas necessários para gerenciar as solicitações do cliente, interagir com as fontes de dados externas (Mercado Livre e Buscapé), salvar e recuperar os resultados no banco de dados.

### 3. `Algorithms`
    - Nesta pasta está os dois arquivos relacionados ao desafio Algorithms and Data Structure.

## Implementação
- O back-end utiliza o Laravel para criar uma API que lida com as solicitações do front-end.
- O web scraping é implementado para obter informações dos sites do Mercado Livre e Buscapé.
- Os resultados da pesquisa são armazenados em um banco de dados para acesso posterior.
- O front-end é construído usando o Vue.js para criar uma experiência de usuário interativa e amigável.
- O mecanismo oferece a capacidade de escolher categorias, sites e realizar pesquisas de produtos.

## Pré-requisitos
Certifique-se de ter as seguintes dependências instaladas:

- PHP
- Composer
- Laravel
- Goutte/Client
- Node.js
- Vue.js

## Configuração
Siga as instruções específicas para cada pasta (front/back) para configurar o ambiente e instalar as dependências necessárias.

## Execução
- Execute o servidor back-end usando o Laravel.
- Execute o servidor front-end usando o Vue.js.
- Acesse o aplicativo por meio de um navegador da web.
- Use o mecanismo de busca para pesquisar produtos e visualize os resultados.

## Contribuições
Contribuições são bem-vindas! Sinta-se à vontade para fazer melhorias no projeto e envie pull requests.

## Observações e Lições Aprendidas
Ao abordar este projeto/desafio, enfrentei algumas dificuldades iniciais devido à minha inexperiência com a linguagem PHP, na qual eu não tinha conhecimento prévio antes de receber este desafio técnico. Isso me levou a enfrentar desafios na estruturação de pastas, organização de arquivos e compreensão das sintaxes da linguagem. Além disso, a implementação da lógica de raspagem de dados com o Laravel e Goutte também se mostrou desafiadora.

Apesar dessas dificuldades e outros pequenos obstáculos que surgiram, fiz o meu melhor para cumprir os requisitos solicitados. É importante destacar que, embora o projeto ainda não esteja 100% funcional no momento, faltando apenas algumas lógicas para a conclusão, considerei essa experiência extremamente valiosa.

Aprendi uma nova linguagem, explorei frameworks e adquiri um entendimento inicial das estruturas do backend. Esta jornada me proporcionou conhecimentos que serão de grande valia no futuro. Mesmo que não alcance a posição desejada neste momento, estou comprometido em continuar meu aprendizado e concluir este projeto full-stack no futuro próximo. Acredito que a experiência adquirida e os conhecimentos obtidos serão fundamentais para meu crescimento profissional, independentemente do resultado atual.
