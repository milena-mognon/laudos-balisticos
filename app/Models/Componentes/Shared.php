<?php
/*
 * Developed by Milena Mognon
 */

namespace App\Models\Componentes;

class Shared
{
    public static function material($material, $quant)
    {
        switch ($material) {
            case 'plástico':
                if ($quant > 1) {
                    return "plásticos";
                } else {
                    return "plástico";
                }
                break;
            case 'metálico':
                if ($quant > 1) {
                    return "metálicos";
                } else {
                    return "metálico";
                }
                break;
            case 'material sintético':
                return "em material sintético";
                break;
            default:
                return "(        )";
                break;
        }
    }
}
