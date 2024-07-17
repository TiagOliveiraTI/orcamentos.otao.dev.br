# Documento de Casos de Uso
## Visão Geral
Este documento descreve os casos de uso do sistema de geração de orçamentos para serviços de desenvolvimento de sites e sistemas. O sistema permitirá que os usuários insiram detalhes sobre os serviços desejados e obtenham um orçamento calculado automaticamente com base nesses detalhes.
### Atores
- Usuário: A pessoa que solicita o orçamento para um serviço.
- Administrador: A pessoa que gerencia os tipos de serviços e seus custos no sistema.
### Casos de Uso
#### Caso de Uso 1: Criar Solicitação de Serviço
##### ID: CDU-01

Descrição: Permite que o usuário insira uma solicitação de serviço detalhando o tipo de serviço requerido e quaisquer detalhes adicionais.

Ator Principal: Usuário

Pré-condições:
- O usuário deve estar autenticado no sistema.

Pós-condições:
- Uma nova solicitação de serviço é criada e armazenada no sistema.

Fluxo Básico:
1. O usuário navega para a página de solicitação de serviço.
1. O usuário seleciona o tipo de serviço desejado (ex: site institucional).
1. O usuário insere detalhes adicionais sobre o serviço.
1. O usuário envia a solicitação.
1. O sistema valida os dados e cria uma nova solicitação de serviço.
1. O sistema confirma a criação da solicitação ao usuário.

Fluxo Alternativo:

- Se o usuário não estiver autenticado, o sistema redireciona para a página de login.

#### Caso de Uso 2: Calcular Orçamento
##### ID: CDU-02

Descrição: Calcula o orçamento para uma solicitação de serviço baseada nos parâmetros fornecidos pelo usuário.

Ator Principal: Usuário

Pré-condições:
- Uma solicitação de serviço deve existir no sistema.

Pós-condições:
- O sistema gera um orçamento detalhado para a solicitação de serviço.

Fluxo Básico:

1. O sistema recebe a solicitação de serviço.
1. O sistema consulta os custos base para cada tipo de serviço solicitado.
1. O sistema calcula o valor total somando os custos base.
1. O sistema gera um orçamento detalhado, incluindo a lista de custos e o valor total.
1. O sistema exibe o orçamento ao usuário.

Fluxo Alternativo:
- Se houver algum erro na consulta dos custos, o sistema exibe uma mensagem de erro ao usuário.

#### Caso de Uso 3: Gerar Orçamento
##### ID: CU-03

Descrição: Gera um orçamento detalhado em formato PDF que pode ser baixado pelo usuário.

Ator Principal: Usuário

Pré-condições:
- O orçamento deve ser calculado previamente.

Pós-condições:
- Um arquivo PDF contendo o orçamento detalhado é gerado e disponível para download.

Fluxo Básico:
1. O usuário solicita a geração do orçamento em PDF.
1. O sistema gera um arquivo PDF com o orçamento detalhado.
1. O sistema disponibiliza o PDF para download.
1. O usuário faz o download do arquivo PDF.

Fluxo Alternativo:
- Se houver algum erro na geração do PDF, o sistema exibe uma mensagem de erro ao usuário.

#### Caso de Uso 4: Gerenciar Tipos de Serviços e Custos
##### ID: CDU-04

Descrição: Permite que o administrador adicione, edite ou remova tipos de serviços e seus custos no sistema.

Ator Principal: Administrador

Pré-condições:
- O administrador deve estar autenticado no sistema.
Pós-condições:
- Os tipos de serviços e seus custos são atualizados no sistema.

Fluxo Básico:
1. O administrador navega para a página de gerenciamento de serviços.
1. O administrador adiciona um novo tipo de serviço, especificando seu nome e custo base.
1. O administrador edita um tipo de serviço existente.
1. O administrador remove um tipo de serviço existente.
1. O sistema atualiza a lista de serviços e custos conforme as ações do administrador.

Fluxo Alternativo:
- Se o administrador não estiver autenticado, o sistema redireciona para a página de login.

### Casos de Uso Secundários
#### Caso de Uso 5: Autenticar Usuário
##### ID: CDU-05

Descrição: Permite que o usuário ou administrador faça login no sistema.

Ator Principal: Usuário/Administrador

Pré-condições:
- O usuário deve ter uma conta existente no sistema.
Pós-condições:
- O usuário ou administrador está autenticado e pode acessar funcionalidades restritas.

Fluxo Básico:
1. O usuário ou administrador navega para a página de login.
1. O usuário ou administrador insere suas credenciais (email e senha).
1. O sistema valida as credenciais.
1. O sistema autentica o usuário ou administrador e redireciona para a página inicial.

Fluxo Alternativo:
- Se as credenciais estiverem incorretas, o sistema exibe uma mensagem de erro.

#### Caso de Uso 6: Registrar Novo Usuário
##### ID: CDU-06

Descrição: Permite que novos usuários se registrem no sistema.

Ator Principal: Usuário

Pré-condições:
- O usuário não deve estar autenticado no sistema.
Pós-condições:
- Um novo usuário é registrado e pode acessar o sistema.

Fluxo Básico:
1. O usuário navega para a página de registro.
1. O usuário insere as informações necessárias (nome, email, senha, etc.).
1. O usuário envia o formulário de registro.
1. O sistema valida os dados e cria uma nova conta de usuário.
1. O sistema autentica automaticamente o usuário e redireciona para a página inicial.

Fluxo Alternativo:
- Se os dados estiverem incompletos ou incorretos, o sistema exibe uma mensagem de erro.
#### Caso de Uso 7: Visualizar Histórico de Orçamentos
##### ID: CDU-07

Descrição: Permite que o usuário visualize um histórico de todos os orçamentos gerados anteriormente.

Ator Principal: Usuário

Pré-condições:
- O usuário deve estar autenticado no sistema.
Pós-condições:
- O usuário pode visualizar uma lista de orçamentos gerados anteriormente.

Fluxo Básico:
1. O usuário navega para a página de histórico de orçamentos.
1. O sistema exibe uma lista de orçamentos gerados anteriormente pelo usuário.
1. O usuário seleciona um orçamento para visualizar os detalhes.
Fluxo Alternativo:
- Se não houver orçamentos gerados, o sistema exibe uma mensagem informando que não há orçamentos disponíveis.

#### Caso de Uso 8: Editar Perfil do Usuário
##### ID: CDU-08

Descrição: Permite que o usuário edite suas informações de perfil.

Ator Principal: Usuário

Pré-condições:
- O usuário deve estar autenticado no sistema.
Pós-condições:
- As informações do perfil do usuário são atualizadas no sistema.

Fluxo Básico:
1. O usuário navega para a página de edição de perfil.
1. O usuário edita as informações desejadas (nome, email, senha, etc.).
1. O usuário envia o formulário de edição.
1. O sistema valida os dados e atualiza o perfil do usuário.
1. O sistema confirma a atualização ao usuário.

Fluxo Alternativo:
- Se os dados estiverem incompletos ou incorretos, o sistema exibe uma mensagem de erro.

#### Caso de Uso 9: Redefinir Senha
##### ID: CDU-09

Descrição: Permite que o usuário redefina sua senha em caso de esquecimento.

Ator Principal: Usuário

Pré-condições:
- O usuário deve ter uma conta existente no sistema.
Pós-condições:
- A senha do usuário é redefinida e ele pode acessar o sistema com a nova senha.

Fluxo Básico:
1. O usuário navega para a página de login e seleciona a opção "Esqueci minha senha".
1. O usuário insere seu email cadastrado.
1. O sistema envia um email com um link para redefinir a senha.
1. O usuário clica no link e navega para a página de redefinição de senha.
1. O usuário insere uma nova senha.
1. O sistema valida a nova senha e atualiza a conta do usuário.
1. O sistema confirma a redefinição da senha ao usuário.

Fluxo Alternativo:
- Se o email não estiver cadastrado, o sistema exibe uma mensagem de erro.

#### Caso de Uso 10: Gerar Relatório de Orçamentos
##### ID: CDU-10

Descrição: Permite que o administrador gere um relatório de todos os orçamentos gerados no sistema.

Ator Principal: Administrador

Pré-condições:
- O administrador deve estar autenticado no sistema.

Pós-condições:
- Um relatório detalhado de todos os orçamentos gerados é criado.

Fluxo Básico:
1. O administrador navega para a página de relatórios.
1. O administrador seleciona o período para o relatório (ex: último mês, último ano).
1. O administrador solicita a geração do relatório.
1. O sistema coleta os dados e gera um relatório detalhado.
1. O sistema disponibiliza o relatório para download em formato PDF ou CSV.

Fluxo Alternativo:
- Se não houver dados para o período selecionado, o sistema exibe uma mensagem informando que não há dados disponíveis.

#### Caso de Uso 11: Configurar Sistema
##### ID: CDU-11

Descrição: Permite que o administrador configure parâmetros gerais do sistema, como taxas de impostos, descontos, etc.

Ator Principal: Administrador

Pré-condições:
- O administrador deve estar autenticado no sistema.

Pós-condições:
- Os parâmetros do sistema são atualizados conforme configurado.

Fluxo Básico:
1. O administrador navega para a página de configurações do sistema.
1. O administrador edita os parâmetros desejados (taxas de impostos, descontos, etc.).
1. O administrador salva as alterações.
1. O sistema valida e aplica as novas configurações.
1. O sistema confirma a atualização das configurações ao administrador.

Fluxo Alternativo:
- Se os dados estiverem incorretos, o sistema exibe uma mensagem de erro.

#### Caso de Uso 12: Notificar Usuário sobre Atualizações
##### ID: CDU-12

Descrição: Permite que o sistema notifique os usuários sobre atualizações importantes, como mudanças nos custos dos serviços ou novas funcionalidades.

Ator Principal: Sistema

Pré-condições:
- O usuário deve ter uma conta no sistema.
Pós-condições:
- O usuário é notificado sobre as atualizações importantes.

Fluxo Básico:
1. O administrador realiza uma atualização importante no sistema.
1. O sistema gera uma notificação para os usuários.
1. O sistema envia a notificação por email aos usuários.
1. O usuário recebe e visualiza a notificação.

Fluxo Alternativo:
- Se houver falha no envio do email, o sistema tenta reenviar a notificação.

