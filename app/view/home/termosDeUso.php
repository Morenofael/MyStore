<?php
#View para a home do sistema

require_once __DIR__ . "/../include/header.php";
require_once __DIR__ . "/../include/menu.php";
?>
<link rel="stylesheet" href="<?= BASEURL ?>/public/css/home.css">
<span id="sidebar-togler" onclick="togleSidebar()">☰</span>
<div class="main">
<?php require_once(__DIR__ . "/../include/sidebar.php") ?>
    <div class="main-content">
        <form id="frmSearch" action="./ProdutoController.php" method="GET">
            <input type="hidden" name="action" value="listByTags">
            <input type="text" name="q" id="txtQuery" placeholder="Pesquise produtos">
            <button type="submit"><img src="<?= BASEURL ?>/view/img/svg/bussola.svg" alt="Engrenagem" class="icon"></button>
        </form>
        <h3>Termos de uso do MyStore</h3>
        <h5>Termos de uso do MyStore</h5>
        <p>Última atualização: 1 de janeiro de 2025</p>
        <p>Toda vez que houver menção aos termos “MySports”, "MS",  “nós” ou “nossos”, estamos nos referindo ao MyStore; da mesma forma, toda vez que houver menção aos termos “você”, “seu”, “sua”, estamos nos referindo a você. </p>
        <p>o MS poderá a qualquer tempo modificar, alterar ou excluir parte do conteúdo destes termos de uso, tudo para melhorar a nossa comunicação e aprimorar nossos serviços. então, nós recomendamos a leitura atenta desta página a cada acesso à plataforma.</p>
        <p>No MySports, oferecemos um serviço de intermediação que contempla: (i) oferta, hospedagem e divulgação de espaços na plataforma para que os vendedores criem anúncios de seus produtos; (ii) divulgação dos anúncios para compradores interessados em adquirir os produtos, gerando liquidez aos vendedores e efetividade à atividade intermediação; (iii) viabilização de serviços logísticos para que os vendedores consigam entregar seus produtos aos compradores; (iv) serviços de gestão de pagamentos eletrônicos, para que compradores e vendedores possam realizar e receber pagamentos de suas transações.</p>
        <p>Para que tudo ocorra bem, nós recomendamos que toda transação seja realizada com cautela e bom senso. você deve avaliar os riscos da negociação, sempre seguindo estes termos de uso.</p>
        <p>Como faço meu cadastro? O cadastro no MySports é a sua entrada em nossa plataforma de intermediação (“cadastro”). você deverá preencher todos os campos do cadastro disponíveis e confirmar o seu endereço eletrônico (e-mail) (“dados pessoais”). Lembrando que todas as informações fornecidas devem ser exatas, precisas e verdadeiras, e que você assume o compromisso de imediatamente atualizar seus dados pessoais sempre que eles sofrerem alguma alteração.</p>
        <p>O conteúdo das informações inseridas no cadastro é de sua exclusiva responsabilidade, não sendo o MySports responsável pela verificação dos seus dados pessoais. Você, como usuário, garante e responde, em qualquer caso, civil e criminalmente, pela veracidade, exatidão e autenticidade dos dados pessoais cadastrados.</p>
        <p>A qualquer momento, o MySports poderá verificar seus dados pessoais, pedindo documentos e comprovantes que confirmem a veracidade das informações do seu cadastro. O MySports pode, ainda, cancelar sua solicitação de cadastro ou seu cadastro já existente se estiver em desacordo com estes termos de uso ou colocar em risco qualquer pessoa, usuário da plataforma ou não. Lembramos também que cada usuário pode ter apenas um cadastro na plataforma e que cadastros duplicados poderão ser inabilitados de forma definitiva e sem notificação prévia.</p>
        <p>E quais são os requisitos? Para se cadastrar na plataforma do MySports, é necessário que você tenha mais de 18 (dezoito) anos e seja capaz na forma da lei, more no brasil, seja registrado no cadastro nacional de pessoas físicas (cpf/me), seja titular de uma conta bancária registrada com o mesmo cpf utilizado para o cadastro na plataforma, e tenha um endereço de e-mail válido. Estas condições são imprescindíveis para recebimento de valores de vendas e reembolsos de compras feitas por boleto.</p>
        <p>Para acessar a conta criada, você terá login e senha, que, como você certamente sabe (mas vale a pena reforçar!), serão de sua completa responsabilidade. Lembre-se de adotar medidas e cautelas necessárias para manter o sigilo de suas informações de acesso no MySports, que jamais devem ser fornecidas a terceiros, ou mesmo cedidas, vendidas ou transferidas a qualquer pessoa. </p>
        <h5>Obrigações e responsabilidades dos usuários</h5>
        <p>Como usuário da nossa plataforma, você deverá sempre agir de acordo com estes termos de uso. para isso, organizamos todas as suas obrigações e responsabilidades aqui.</p>
        <p>O seu brechó no MySports será nomeado do modo que você escolher. Você não poderá utilizar nomes ofensivos ou obcenos.</p>
        <h5>Para incluir os anúncios e vender seus produtos na plataforma, é necessário que o usuário vendedor:</h5>
        <ul>
            <li>Tenha capacidade legal para negociar o produto;</li>
            <li>Confirme seu e-mail de cadastro;</li>
            <li>Não divulgue seus dados pessoais como números de celular, endereço de e-mail, perfis em redes sociais e Dados da conta bancária;</li>
            <li>Não utilize palavras de baixo calão e/ou de sentido dúbio;</li>
            <li>Não utilize fotos retiradas da internet ou que violem quaisquer direitos autorais;</li>
            <li>não coloque fotos com montagens e/ou com marca d’água;</li>
            <li>Não realize práticas abusivas;</li>
            <li>Respeite a legislação vigente, não utilizando propagandas enganosas que possam induzir o usuário comprador a erro;</li>
            <li>Informe com clareza as características do produto ou do serviço, o preço, bem como eventuais despesas adicionais;</li>
            <li>Indique a quantidade de produto ofertado; </li>
            <li>Anuncie apenas produtos disponíveis para envio imediato; </li>
            <li>Entre em contato com o usuário comprador após a confirmação da venda, esclarecendo as dúvidas Eventualmente existentes; e</li>
            <li>Reserve o produto para entrega, conforme condições previstas nestes termos de uso e acordadas com o usuário comprador.</li>
        </ul>
        <p>Mas fique atento, só poderão ser anunciados no Enjoei produtos cuja venda não esteja expressamente proibida nestes termos de uso e pela legislação vigente no brasil. Também são expressamente proibidos os anúncios e a venda de produtos que tenham sua comercialização proibida e/ou controlada no território brasileiro.</p>
        <p>Além disso, o usuário vendedor que atuar na plataforma de forma habitual ou em volume que indique finalidade comercial está ciente de que é responsável pela emissão dos documentos fiscais correspondentes às suas vendas e pelo recolhimento dos tributos devidos, comprometendo-se, em caso de descumprimento, a isentar o Enjoei de qualquer responsabilidade nesse sentido.</p>
        <p>Sobre a disponibilidade do produto, você, na qualidade de usuário vendedor, declara possuir o produto ofertado, em território nacional, para entrega imediata.</p>
        <p>Já para comprar os produtos de outros usuários, você, enquanto usuário comprador, deverá: </p>
        <ul>
            <li>Ter capacidade legal para negociar o produto;</li>
            <li>Contatar o usuário vendedor após realizar a compra na plataforma, esclarecendo as dúvidas eventualmente existentes; e</li>
            <li>Confirmar o recebimento do produto.</li>
        </ul>
        <p>Atenção! Se qualquer prática violar estes termos de uso, nós poderemos, a nosso exclusivo critério e sem aviso prévio, excluir, cancelar ou bloquear quaisquer anúncios de produtos e comentários que violem as regras aqui estabelecidas, sem prejuízo da aplicação de outras penalidades previstas nestes termos de uso ou que julguemos cabíveis.</p>
        <p>Sobre a sua responsabilidade: aos usar os nossos serviços de intermediação, você compreende que realizamos a intermediação de negócios, sendo as condições de venda dos produtos anunciados na plataforma livremente determinadas entre os usuários. nós não assumimos responsabilidade, nem fornecemos nenhum tipo de garantia dos produtos anunciados.</p>
        <p>Então, todas as operações de compra e venda realizadas na plataforma do Enjoei serão de responsabilidade exclusiva dos usuários vendedores e compradores. Ao usar nossos serviços de intermediação, você aceita e compreende que, ao realizar negociações com outros usuários, o faz por sua conta e risco.</p>
        <ol>
            <li>lorem ipsum</li>
            <li>Não pode vneder pod</li>
            <li>Ñ pode vender diamba (makonha )vencida</li>
            <li>Os originais do samba sao mt bons pprt</li>
            <li>Programar ouvinfo samba é uma vibe</li>
            <li>Se tiver dificil de mnadar pix da pra mandar umas latas de heinekcen no lugar do dinheiro</li>
            <li>proibido vender roupa original 🏴‍☠️🏴‍☠️🏴‍☠️</li>
            <li>proibido dar dinheiro pra netflix 🏴‍☠️🏴‍☠️🏴‍☠️</li>
       </ol>
    </div>
</div>

<script src="<?= BASEURL ?>/public/js/home.js"></script>
<?php require_once __DIR__ . "/../include/footer.php";
?>
