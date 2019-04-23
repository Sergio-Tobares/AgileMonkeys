<?php
namespace common\components;

use Yii;
use yii\base\Component;
use app\models\Movimientos;
use app\models\Cuotas;
use app\models\Socios;
use app\models\Articulos;

class MisFunciones extends Component {

	public function FechaEng($fecha)
	{
		$resultado = substr($fecha, 6,4)."-".substr($fecha, 3,2)."-".substr($fecha, 0,2).substr($fecha, 10,6);
		if ($fecha==null)
			return null;
		else
			return $resultado;
	}
	public function FechaEsp($fecha)
	{ //aaaa-mm-dd 0123-56-78
		$resultado = substr($fecha, 8,2)."-".substr($fecha, 5,2)."-".substr($fecha, 0,4).substr($fecha, 10,6);
		if ($fecha==null)
			return null;
		else
			return $resultado;
	}

	/* FIN FUNCIONES PROPIAS */

}
?>
