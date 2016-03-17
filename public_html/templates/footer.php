<?php

/**
 * Description of footer
 *
 * @author rostom
 */
class footer {

    private $_scripts = array();
    
    public function __construct() {
        
    }
    public function ShowALLFooter(){
        foreach ($this->ReturnFooterScript() as $footer_scripts){
            echo $footer_scripts;
        
        }
        echo '</body></html>';
    }

    public function FooterScripts(array $scripts) {
        $this->_scripts = $scripts;
    }
    public function ReturnFooterScript(){
        return $this->_scripts;
    }
    

}