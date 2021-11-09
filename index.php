<?php
require_once './Jogos.php';

function montagem() {
    $html = '';

    $j = new Jogos(10, 10);
    
    $jogos = $j->geraJogos();
    
    $j->sorteiaDezenas();
    
    $resultado = $j->getResultado();
    
    $html .= 'Resultado: ';

    foreach ($resultado as $key => $value) {
        $html .= $value; 
        
        $html .= $key < (count($resultado)) - 1 ? ' - ' : '';
    }
    
    $html .= '<br><br><br><br>';
    
    $html .= '<table>';
    
    $html .= '<tr>';
    
    $html .= '<th>Jogos</th>';
    
    $html .= '</tr>';
    
    foreach ($jogos as  $jogo) {
    
        $html .= '<tr><td>';
    
        foreach ($jogo as $key => $value) {
            $style = in_array($value, $resultado) ? "style='background-color: yellow;'" : '';
            
            $html .= "<label $style>" . $value . '</label>'; 
            
            $html .= $key < (count($jogo)) - 1 ? ' - ' : '';
        }
        $html .= '</td></tr>';
    }
    
    $html .= '</table>';

    return $html;
}

echo montagem();