            <?php 
               if (isset($_SESSION['user_id'])) {
                  echo '<li><a href="#" data-toggle="modal" data-target="#settings"><strong>'.$_SESSION['f_name'].' '.$_SESSION['l_name'].'</strong></a></li>
                              <li class="dropdown">
               <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
               <span class="glyphicon glyphicon-check dropdown-toggle"></span></a>
               <ul class="dropdown-menu">
                  <li>
                     <a href="#">
                        <h3>CS 451</h3>
                        <span class="glyphicon glyphicon-plus-sign plus-glyph"> </span>
   
                        <h4>Mike Geary</h4>
                     </a>
                  </li>
                  <li>
                     <a href="#">
                        <h3>CS 431</h3>
                        <span class="glyphicon glyphicon-plus-sign plus-glyph"> </span>
   
                        <h4>Robert Howell</h4>
                     </a>
                  </li>
                  <li>
                     <a href="#">
                        <h3>BA 403</h3>
                        <span class="glyphicon glyphicon-plus-sign plus-glyph"> </span>
   
                        <h4>Lonnie Smith</h4>
                     </a>
                  </li>
               </ul>
            </li>';
               } else {
                  echo '<li><a href="#" data-toggle="modal" data-target="#signIn"><strong>Log in</strong></a></li>';
               }  
                
            ?>