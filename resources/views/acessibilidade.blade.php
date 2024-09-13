@extends('layouts.master')
@section('content')
<div class="row">
   <div class="col-md-8 col-12 text-dark">
      <h5 class="default-header"><i class="fab fa-accessible-icon"></i> ACESSIBILIDADE</h5>
      


  <br/>
                
       <p>Este sítio eletrônico segue as diretrizes do eMAG (Modelo de Acessibilidade em Governo Eletrônico), conforme as normas do Governo Federal, em obediência ao Decreto 5.296, de 2.12.2004.</p>
        <p>O termo acessibilidade significa incluir a pessoa com deficiência na participação de atividades como o uso de produtos, serviços e informações. Alguns exemplos são os prédios com rampas de acesso para cadeira de rodas e banheiros adaptados para deficientes.</p>
        <p>Na internet, acessibilidade refere-se principalmente às recomendações do WCAG (World Content Accessibility Guide) do W3C e no caso do Governo Brasileiro ao eMAG (Modelo de Acessibilidade em Governo Eletrônico). O eMAG está alinhado às recomendações internacionais, mas estabelece padrões de comportamento acessível para sites governamentais.</p>
        <p>Na parte superior deste sítio existe uma barra de acessibilidade onde se encontram atalhos de navegação padronizados e a opção para alterar o contraste da tela. Essas ferramentas estão disponíveis em todas as páginas do sítio.</p>
        <p>A seguir uma lista das ferramentas de acessibilidade disponíveis em nossa barra:</p>
        <h2>Facilitando a visualização</h2>
        <p>
            <strong>Alto Contraste:</strong>
            Alterna o esquema de cores dos textos e fundo da tela para branco e preto, maximizando o contraste para melhor leitura.
        </p>
        <h2>Atalhos de navegação via teclado</h2>
        <p>Os atalhos padrões deste sítio eletrônico são:</p>
        <ul>
            <li>Teclando-se <strong>Alt + 1</strong> em qualquer página do portal, chega-se diretamente ao começo do conteúdo principal da página.</li>
            <li>Teclando-se <strong>Alt + 2</strong> em qualquer página do portal, chega-se diretamente ao início do menu principal.</li>
            <li>Teclando-se <strong>Alt + 3</strong> em qualquer página do portal, chega-se diretamente em sua busca interna.</li>
        </ul>
        <p>Quem prefere utilizar o Internet Explorer é preciso apertar o botão Enter do seu teclado após uma das combinações acima. Portanto, para chegar ao campo de busca de interna é preciso pressionar Alt+3 e depois Enter.</p>
        <p>No caso do 
            <strong>Firefox</strong>, em vez de Alt + número, tecle simultaneamente Alt + Shift + número.<br>Sendo <strong>Firefox no Mac OS</strong>, em vez de Alt + Shift + número, tecle simultaneamente Ctrl + Alt + número.<br>No Opera, as teclas são Shift + Escape + número. Ao teclar apenas Shift + Escape, o usuário encontrará uma janela com todas as alternativas de ACCESSKEY da página.
        </p>
        <h2>Facilitando a leitura</h2>
        <p>Embora não estejam em nossa barra de acessibilidade, os seguintes comandos de seu navegador podem ser utilizados para ajuste do tamanho do texto:</p>
        <ul>
            <li>Aumentar fonte: Ctrl + +.</li>
            <li>Diminuir fonte: Ctrl + -</li>
            <li>Fonte Normal (redimensiona para o tamanho padrão): Ctrl + 0.</li>
        </ul>        
        <p>Ao final desse texto, você poderá baixar alguns arquivos que explicam melhor o termo acessibilidade e como deve ser implementado nos sites da Internet.</p>
        <h2>Leis e decretos sobre acessibilidade:</h2>
        <ul>
            <li>Decreto nº 5.296 de 02 de dezembro de 2004 (<a href="http://www.planalto.gov.br/ccivil_03/_Ato2004-2006/2004/Decreto/D5296.htm">http://www.planalto.gov.br/ccivil_03/_Ato2004-2006/2004/Decreto/D5296.htm</a>).
            </li>
            <li>Decreto nº 6.949, de 25 de agosto de 2009 - Promulga a Convenção Internacional sobre os Direitos das Pessoas com Deficiência e seu Protocolo Facultativo, assinados em Nova York, em 30 de março de 2007 (<a href="http://www.planalto.gov.br/ccivil_03/_ato2007-2010/2009/decreto/d6949.htm">http://www.planalto.gov.br/ccivil_03/_ato2007-2010/2009/decreto/d6949.htm</a>).</li>
            <li>Decreto nº 7.724, de 16 de Maio de 2012 - Regulamenta a Lei No 12.527, que dispõe sobre o acesso a informações (<a href="http://www.planalto.gov.br/ccivil_03/_ato2011-2014/2012/Decreto/D7724.htm">http://www.planalto.gov.br/ccivil_03/_ato2011-2014/2012/Decreto/D7724.htm.<br> Modelo de Acessibilidade de Governo Eletrônico (</a><a href="http://www.governoeletronico.gov.br/acoes-e-projetos/e-MAG">http://www.governoeletronico.gov.br/acoes-e-projetos/e-MAG</a>).</li>
            <li>Portaria nº 03, de 07 de Maio de 2007 - <small>formato .pdf (35,5Kb)</small> - Institucionaliza o Modelo de Acessibilidade em Governo Eletrônico – e-MAG (<a href="http://www.governoeletronico.gov.br/biblioteca/arquivos/portaria-no-03-de-07-05-2007">http://www.governoeletronico.gov.br/biblioteca/arquivos/portaria-no-03-de-07-05-2007</a>).</li>
        </ul>
        <h2>Dúvidas, sugestões e críticas:</h2>
        <p>No caso de problemas com a acessibilidade do portal, favor acessar a Página de Contato.</p>
        <h2>Dicas, links e recursos úteis:</h2>
        <ul>
            <li><a href="http://acessibilidadelegal.com/">Acessibilidade Legal</a><small>(link externo)</small></li>
            <li><a href="http://acessodigital.net/links.html">Acesso Digital</a><small>(link externo)</small></li>
        </ul>

    


   </div>
   <div class="col-md-4 col-12">
      @include("layouts._right_column")
   </div>
</div>
</div>
@endsection