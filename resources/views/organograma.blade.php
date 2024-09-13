@extends('layouts.master')
@section('styles')
    <!--Dynamic StyleSheets added from a view-->
    <link href="{{asset('css/organograma.css')}}" rel="stylesheet">
@stop
@section('content')

<script type="text/javascript">
    $(function () {
        $("[rel='tooltip']").tooltip();
    });
</script>


<div class="row">
   <div class="col-md-12 col-12">
      <h5 class="default-header"><i class="fas fa-users"></i> ORGANOGRAMA</h5>


<!--
<div class="alert alert-light text-dark" role="alert">
  <h5>Passe o cursor em cima dos setores abreviados para mais informações. <i class="fas fa-mouse-pointer"></i></h5>
  <small>atualizado em 19/06/2018 - 11:06</small>

</div>

      <ol class="organizational-chart">
         <li>
            <div class="text-white">
               <h5>Secretário(a) Municipal de Saúde</h5>
               <span>Huark Douglas Correia</span>
            </div>
            <ol>
               <li>
                  <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA ESPECIAL REDE ASSISTENCIAL SECRETARIA EXECUTIVA DO CMS">
                     <h3 class="text-uppercase">CERASECMS</h3>
                  </div>
                  <ol>
                     <li>
                        <div data-toggle="tooltip" data-placement="top" title="OUVIDORIA GERAL DO SUS">
                           <h5>OGSUS</h5>
                        </div>
                        
                     </li>
                    
                  </ol>
               </li>
               <li>
                  <div>
                     <h3 class="text-uppercase">ASSESSORIA GABINETE</h3>
                  </div>
               </li>
               <li>
                  <div>
                     <h2 class="text-uppercase">ASSESSORIA TÉCNICA GABINETE</h2>
                  </div>
               </li>

               <li>
                  <div>
                     <h2 class="text-uppercase">ASSESSORIA PLANEJAMENTO GESTÃO</h2>
                  </div>
                  <ol>
                     <li>
                        <div>
                           <h3>ASS. I</h3>
                        </div>
                     </li>
                  </ol>
               </li>


                <li>
                  <div>
                     <h2 class="text-uppercase">ASSESSORIA DE COMUNICAÇÃO</h2>
                  </div>
               </li>


                 <li>
                  <div>
                     <h2 class="text-uppercase">AUDITORIA GERAL SMS</h2>
                  </div>
               </li>



                  <li>
                  <div>
                     <h2 class="text-uppercase">ASSESSORIA CHEFE GABINETE</h2>
                  </div>  
                  <ol>
                     <li>
                        <div>
                           <h3>ASS. I</h3>
                        </div>
                     </li>
                     <li>
                        <div>
                           <h3>ASS. II</h3>
                        </div>
                     </li>
                  </ol>
               </li>




                <li>
                  <div>
                     <h2 class="text-uppercase">ASSESSORIA JURÍDICO</h2>
                  </div>  
                  <ol> 
                     <li>
                        <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA ESPECIAL REDE ASSISTENCIAL TÉCNICO DE GABINETE">
                           <h3>CARETG</h3>
                        </div>
                     </li>

                     <li>
                         <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA ESPECIAL REDE ASSISTENCIAL JURÍDICA">
                           <h3>CERAJ</h3>
                        </div>
                         <ol>
                           <li>
                             <div data-toggle="tooltip" data-placement="top" title="COORDENADORIAJURÍDICA">
                                 <h6>CJ</h6>
                              </div>
                           </li>
                           <li>
                               <div data-toggle="tooltip" data-placement="top" title="GERÊNCIA ADMINISTRATIVA DE ASSESSORIA JURÍDICA">
                                 <h6>GAAJ</h6>
                              </div>
                           </li>
                         </ol>
                     </li>
                     
                  </ol>
               </li>



                  <li>
                     <div data-toggle="tooltip" data-placement="top" title="SECRETARIA ADJUNTA DE PLANEJAMENTO E OPERAÇÕES">
                      <h2 class="text-uppercase">SAPO</h2>
                     </div> 

                       <ol> 
                     <li>
                        <div> 
                           <h3>SUPERINTENDÊNCIA</h3>
                        </div>

                         <ol>
                           <li>
                              <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA ESPECIAL REDE ASSISTENCIAL CONTROLE E AVALIAÇÃO">
                                 <h6>CERACA</h6>
                              </div>
                                    <ol>
                                       <li>
                                         <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA CONTROLE E AVALIAÇÃO AMBULATORIAL">
                                          <h6>CCAA</h6>
                                          </div>
                                       </li>
                                    </ol>
                           </li>
                           <li>
                            <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA ESPECIAL REDE ASSISTENCIAL CONTROLE E AVALIAÇÃO">
                                 <h6>CERAC</h6>
                              </div>
                           </li>
                         </ol>

                     </li>

                     <li>
                        <div data-toggle="tooltip" data-placement="top" title="DIRETOR TÉCNICO DO HPSMC">
                           <h3>DTHPSMC</h3>
                        </div>
                          <ol>
                           <li>
                              <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA ESPECIAL REDE ASSISTENCIAL DE ENFERMAGEM DO HPSMC">
                              <h6>CERAE</h6>
                              </div>
                           </li>

                            <li>
                              <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA ESPECIAL REDE ASSISTENCIAL ADMINISTRATIVA DO HPSMC">
                              <h6>CERAADM</h6>
                              </div>
                                  <ol>
                                    <li>
                                       <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA TÉCNICA DE EQUIPAMENTO">
                                       <h6>CTE</h6>
                                       </div>
                                          <ol>
                                             <li>
                                                <div data-toggle="tooltip" data-placement="top" title="GERÊNCIA MÉDICO HOSPITALAR E MEDICAMENTOS">
                                                <h6>GMHM</h6>
                                                </div>
                                             </li>
                                             <li>
                                                <div data-toggle="tooltip" data-placement="top" title="GERÊNCIA APOIO DIAGNOSTICO E TERAPÊUTICO">
                                                <h6>GADT</h6>
                                                </div>
                                             </li>
                                              <li>
                                                <div data-toggle="tooltip" data-placement="top" title="GERÊNCIA DE LOGISTICA">
                                                <h6>GL</h6>
                                                </div>
                                             </li>
                                              <li>
                                                <div data-toggle="tooltip" data-placement="top" title="GERÊNCIA DE FATURAMENTO">
                                                <h6>GF</h6>
                                                </div>
                                             </li>
                                          </ol>

                                    </li>
                                  </ol>
                           </li>
                        </ol>
                     </li>
                     
                  </ol> 
                  </li>

                 
                   <li>
                     <div data-toggle="tooltip" data-placement="top" title="SECRETARIA ADJUNTA DE ASSISTÊNCIA">
                      <h2 class="text-uppercase">SAA</h2>
                     </div> 

                         <ol>
                           <li>
                              <div data-toggle="tooltip" data-placement="top" title="DIRETORIA TÉCNICA DE ATENÇÃO PRIMÁRIA">
                              <h6>DTAP</h6>
                              </div>
                                    <ol>
                                    <li>
                                       <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA ESPECIAL REDE ASSISTENCIAL AÇÕES BÁSICAS">
                                       <h6>CERAAB</h6>
                                       </div>
                                             <ol>
                                             <li>
                                             <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA PROGRAMAS ESTRATÉGICOS">
                                             <h6>CPE</h6>
                                             </div>
                                             </li>

                                              <li>
                                              <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA PROGRAMAS ESPECIAIS">
                                             <h6>CPE</h6>
                                             </div>
                                             </li>


                                              <li>
                                             <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA DE SAÚDE BUCAL">
                                             <h6>CSB</h6>
                                             </div>
                                             </li>

                                              <li>
                                              <div data-toggle="tooltip" data-placement="top" title="COORDENADORIACLINICAODONTOLÓGICA">
                                             <h6>CCO</h6>
                                             </div>
                                             </li>

                                             </ol> 

                                    </li>




                                    <li>
                                       <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA ESPECIAL REDE ASSISTENCIAL REGIONAL NORTE">
                                       <h6>CERASRN</h6>
                                       </div>
                                             <ol>
                                             <li>
                                             <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA ESPECIAL REDE ASSISTENCIAL REGIONAL SUL">
                                             <h6>CERASRS</h6>
                                             </div>
                                             </li>

                                              <li>
                                              <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA ESPECIAL REDE ASSISTENCIAL REGIONAL OESTE">
                                             <h6>CERASRO</h6>
                                             </div>
                                             </li>


                                              <li>
                                                 <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA ESPECIAL REDE ASSISTENCIAL REGIONAL LESTE">
                                             <h6>CERASRL</h6>
                                             </div>
                                             </li>

                                              <li>
                                                <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA ESPECIAL REDE ASSISTENCIAL REGIONAL RURAL">
                                             <h6>CERASRR</h6>
                                             </div>
                                             </li>

                                             </ol> 

                                    </li>


                                    </ol>
                            </li>




                            <li>
                              <div data-toggle="tooltip" data-placement="top" title="DIRETORIA TÉCNICA ATENÇÃO SECUNDÁRIA">
                              <h6>DTAS</h6>
                              </div>

                                  <ol>
                                    <li>
                                      <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA ESPECIAL REDE ASSISTENCIAL IMAGEM E LABORATORIAL">
                                    <h6>CERAIL</h6>
                                    </div>
                                          <ol>
                                          <li>
                                          <div data-toggle="tooltip" data-placement="top" title="COORDENADORIADST/AIDS/CER">
                                          <h6>CDST</h6>
                                          </div>
                                          </li>
                                          </ol>

                                          <ol>
                                          <li>
                                         <div data-toggle="tooltip" data-placement="top" title="CORDENADORIA DO CENTRO DE ESPECIALIDADES MÉDICAS">
                                          <h6>CCEM</h6>
                                          </div>
                                          </li>
                                          </ol>


                                          <ol>
                                          <li>
                                          <div data-toggle="tooltip" data-placement="top" title="COORDENADORI A DO SAE">
                                          <h6>CSAE</h6>
                                          </div>
                                          </li>
                                          </ol>                                     
                                    </li>
                                  </ol>



                                  
                                    <li>
                                     <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA ESPECIAL REDE ASSISTENCIAL SAÚDE MENTAL">
                                    <h6>CERASMS</h6>
                                    </div>
                                          <ol>
                                          <li>
                                          <div data-toggle="tooltip" data-placement="top" title="GERÊNCIACAPS-AD">
                                          <h6>GCAPS AD</h6>
                                          </div>
                                          </li>
                                          </ol>

                                          <ol>
                                          <li>
                                           <div data-toggle="tooltip" data-placement="top" title="GERÊNCIACAPS-CPAIV">
                                          <h6>GCAPS CPA</h6>
                                          </div>
                                          </li>
                                          </ol>


                                          <ol>
                                          <li>
                                           <div data-toggle="tooltip" data-placement="top" title="GERÊNCIACAPS-II">
                                          <h6>GCAPS II</h6>
                                          </div>
                                          </li>
                                          </ol>  


                                          <ol>
                                          <li>
                                           <div data-toggle="tooltip" data-placement="top" title="GERENCIA DAS RESIDÊNCIAS TERAPÊUTICAS">
                                          <h6>GRT</h6>
                                          </div>
                                          </li>
                                          </ol>                                     
                                    </li>
                                  



                                   
                                    <li>
                                     <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA ESPECIAL REDE ASSISTENCIAL GERAL">
                                    <h6>CERAG</h6>
                                    </div>
                                          <ol>
                                          <li>
                                           <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA ESPECIAL REDE ASSISTENCIAL POLICLINICA DO VERDÃO">
                                          <h6>CERAPV</h6>
                                          </div>
                                          </li>
                                          </ol>

                                          <ol>
                                          <li>
                                           <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA ESPECIAL REDE ASSISTENCIAL POLICLINICA DO PLANALTO">
                                          <h6>CERAPP</h6>
                                          </div>
                                          </li>
                                          </ol>


                                          <ol>
                                          <li>
                                          <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA ESPECIAL REDE ASSISTENCIAL POLICLINICA DO COXIPÓ">
                                          <h6>CERAPC</h6>
                                          </div>
                                          </li>
                                          </ol>  


                                          <ol>
                                          <li>
                                           <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA ESPECIAL REDE ASSISTENCIAL POLICLINICA DO PASCOAL RAMOS">
                                          <h6>CERAPPR</h6>
                                          </div>
                                          </li>
                                          </ol>   

                                          <ol>
                                          <li>
                                           <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA ESPECIAL REDE ASSISTENCIAL POLICLICA PEDRA 90">
                                          <h6>CERAPP90</h6>
                                          </div>
                                          </li>
                                          </ol>  

                                           <ol>
                                          <li>
                                           <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA ESPECIAL REDE ASSISTENCIAL UNIDADE DE PRONTO ATENDIMENTO">
                                          <h6>CERAUPA</h6>
                                          </div>
                                          </li>
                                          </ol>                                                                             
                                    </li>
                                 

                           </li>



                            <li>
                               <div data-toggle="tooltip" data-placement="top" title="DIRETORIA TECNICA DE VIGILÂNCIA EM SAÚDE">
                              <h6>DTVS</h6>
                              </div>

                                       <ol>
                                       <li>
                                        <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA ESPECIAL REDE ASSISTENCIAL VIGILÂNCIA SANITÁRIA">
                                       <h6>CERAVS</h6>
                                       </div>
                                          <ol>
                                          <li>
                                           <div data-toggle="tooltip" data-placement="top" title="GERÊNCIA VIGILÂNCIA DE PRODUTOS E SERVIÇOS">
                                          <h6>GVPS</h6>
                                          </div>
                                          </li>
                                          </ol> 
 

                                       </li>
                                       </ol> 


                                     
                                       <li>
                                        <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA ESPECIAL REDE ASSISTENCIAL CENTRO CONTROLE E ZOONOSES">
                                       <h6>CERACCZ</h6>
                                       </div>

                                          <ol>
                                          <li>
                                           <div data-toggle="tooltip" data-placement="top" title="GERÊNCIA DE VIGILÂNCIA ENDEMIAS E ANIMAIS SINANTROPICÓS">
                                          <h6>GVEAS</h6>
                                          </div>
                                          </li>
                                          </ol>  

                                       </li>
                                      


                                       
                                       <li>
                                        <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA ESPECIAL REDE ASSISTENCIAL VIGILÂNCIA DOENÇAS E AGRAVOS">
                                       <h6>CERAVDA</h6>
                                       </div>

                                          <ol>
                                          <li>
                                           <div data-toggle="tooltip" data-placement="top" title="GERÊNCIA VIGILÂNCIA DOENCAS E AGRAVOS TRANSMISSÍVEIS">
                                          <h6>GVDAT</h6>
                                          </div>
                                          </li>
                                          </ol> 


                                          <ol>
                                          <li>
                                           <div data-toggle="tooltip" data-placement="top" title="GERÊNCIA VIGILÂNCIA NASCIDOS E ÓBITOS">
                                          <h6>GVNO</h6>
                                          </div>
                                          </li>
                                          </ol> 

                                       </li>
                                                                 

                           </li>


                        </ol>

                  </li>






                  <li>
                     <div data-toggle="tooltip" data-placement="top" title="SECRETARIA ADJUNTO DE GESTÃO">
                      <h2 class="text-uppercase">SAG</h2>
                     </div> 
                           

                           <ol>
                           <li>
                            <div data-toggle="tooltip" data-placement="top" title="DIRETORIA TÉCNICA OBRAS E SERVIÇOS">
                           <h6>DTOS</h6>
                           </div>

                                 <ol>
                                 <li>
                                  <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA ESPECIAL REDE ASSISTENCIAL TÉCNICO DE OBRAS E SERVIÇOS">
                                 <h6>CERATOS</h6>
                                 </div>
                                 </li>
                                 </ol>


                                 <ol>
                                 <li>
                                  <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA ESPECIAL REDE ASSISTENCIAL DE SERVIÇOS">
                                 <h6>CERAS</h6>
                                 </div>

                                          <ol>
                                          <li>
                                           <div data-toggle="tooltip" data-placement="top" title="GÊRENCIA DE MANUTENÇÃO">
                                          <h6>GM</h6>
                                          </div>
                                          </li>
                                          </ol>

                                 </li>
                                 </ol> 







                           <li>
                            <div data-toggle="tooltip" data-placement="top" title="DIRETORIA TÉCNICA DE LOGÍSTICA E SUPRIMENTOS">
                           <h6>DTLS</h6>
                           </div>

                                 <ol>
                                 <li>
                                  <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA DE LOGÍSTICA E SUPRIMENTOS">
                                 <h6>CLS</h6>
                                 </div>
                                 </li>
                                 </ol>



                                 <ol>
                                 <li>
                                  <div data-toggle="tooltip" data-placement="top" title="GÊRENCIA DE PATRIMÔNIO">
                                 <h6>GP</h6>
                                 </div>

                                 </li>
                                 </ol> 

                           </li>
                       





                           
                           <li>
                            <div data-toggle="tooltip" data-placement="top" title="DIRETORIA ADMINISTRATIVA E FINANCEIRA">
                           <h6>DAF</h6>
                           </div>

                              <ol>

                                 <li>
                                  <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA ESPECIAL REDE ASSISTENCIAL ADMINISTRATIVA">
                                 <h6>CERAA</h6>
                                 </div>
                                       <ol>
                                       <li>
                                       <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA DE CONTRATOS COOORDENADORIA ADMINISTRATIVA">
                                       <h6>CCCA</h6>
                                       </div>

                                       </li>
                                       </ol>
                                 </li>





                                  
                                 <li>
                                  <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA ESPECIAL REDE ASSISTENCIAL FINANCEIRA">
                                 <h6>CERAF</h6>
                                 </div>
                                    <ol>
                                       <li>
                                          <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA EXECUTIVA FINANCEIRA">
                                          <h6>CEF</h6>
                                          </div>
                                       </li>
                                    </ol>
                                 </li>
                    

                                 
                                 <li>
                                  <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA ESPECIAL REDE ASSISTENCIAL CONTABILIDADE">
                                 <h6>CERAC</h6>
                                 </div>
                                 </li>
                                    


                                 <li>
                                  <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA ESPECIAL REDE ASSISTENCIAL ORÇAMENTO">
                                 <h6>CERAO</h6>
                                 </div>
                                    <ol>
                                       <li>
                                          <div data-toggle="tooltip" data-placement="top" title="GERÊNCIA DE CONTRATOS">
                                          <h6>GC</h6>
                                          </div>
                                       </li>
                                    </ol>
                                
                                 <li>
                           




                                 <li>
                                  <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA ESPECIAL REDE ASSISTENCIAL TECNOLOGIA E INFORMÁTICA">
                                 <h6>CERATI</h6>
                                 </div>
                                 </li>
                                    

                                 <li>
                                  <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA ESPECIAL REDE ASSISTENCIAL ESPECIALIDADE EM REDES E TECNOLÓGIA">
                                 <h6>CERATOS</h6>
                                 </div>
                                 </li>
                                    

                                 <li>
                                  <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA ESPECIAL REDE ASSISTENCIAL GESTÃO DE PESSOAS">
                                 <h6>CERAGP</h6>
                                 </div>
                                 </li>
                                    
                                 <li>
                                  <div data-toggle="tooltip" data-placement="top" title="COORDENADORIA DE DESENVOLVIMENTO HUMANO GERÊNCIA DE DE DESENVOLVIMENTO DE PESSOAS GERÊNCIA DE GESTÃO DE PESSOAS">
                                 <h6>CDH GDP GD</h6>
                                 </div>
                                 </li>

                           </li>
                           </ol> 

                  </li>







            </ol>
         </li>
      </ol>
   </div>
</div>
-->

<div class="alert alert-light text-dark" role="alert">
  <h5>Temporariamente Indisponível.</h5>
</div>

</div>
</div>
@endsection