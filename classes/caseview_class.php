<?php
class CaseView extends Content {
    private function is_authorized()
    {
      if (isset($_SESSION['userid']) && $_SESSION['userlevel'] >= 4){
        return true;
      }
      return false;
    }

    public function show_case()
    {
        echo'
        <div class="card">
            <h3 class="card-header">CASE</h3>
            <div class="card-body">
                <h4 class="card-title">CONTENT</h4>
                <p class="card-text">DESCRIPTION.</p>

            </div>
            <div class="card-footer">
            <div id="accordion">
            <div class="card">
              <div class="card-header" id="headingOne">
                <p class="mb-0">
                  <button class="btn btn-link fa fa-minus" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"></button>
                  COMMENT USER
                </p>
                </div>
          
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably havent heard of them accusamus labore sustainable VHS.
                </div>
                
                <div class="card">
                <div class="card-header" id="headingTwo">
                  <p class="mb-0">
                    <button class="btn btn-link fa fa-minus" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"></button>
                    COMMENT USER
                  </p>
                  </div>
            
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#collapseOne">
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably havent heard of them accusamus labore sustainable VHS.
                  </div>
                </div>  

              </div>
            </div>
          
            </div>        
        </div>
        ';
    }
}
