<?php
namespace TestBundle\Helper;

class File
{
    public $name;
    public $lenNameMax;
    public $extensMax;


    public function __construct($lenNameMax, $extensMax)
    {
        $this->lenNameMax = $lenNameMax;
        $this->extensMax = $extensMax;
    }
	


	public function getName()
	{
       return $this->name; 
	}

	public function setName($name)
	{
		$this->name = $name;
	}


	public function getLenNameMax()
	{
       return $this->lenNameMax; 
	}


	public function getExtensMax()
	{
       return $this->extensMax; 
	}
	



	public function fileNameTransform() {

	    $name = $this->getName();
	    $lenNameMax = $this->getLenNameMax();
	    $extensMax = $this->getExtensMax();


	    $name = strtr($name, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
	    $name = strtr($name, array('А'=>'A','Б'=>'B','В'=>'V','Г'=>'G','Д'=>'D','Е'=>'E','Ё'=>'E','Ж'=>'J','З'=>'Z','И'=>'I','Й'=>'Y','К'=>'K','Л'=>'L','М'=>'M','Н'=>'N','О'=>'O','П'=>'P','Р'=>'R','С'=>'S','Т'=>'T','У'=>'U','Ф'=>'F','Х'=>'H','Ц'=>'C','Ч'=>'CH','Ш'=>'SH','Щ'=>'SHCH','Ы'=>'Y','Э'=>'E','Ю'=>'YU','Я'=>'YA','Ъ'=>'','Ь'=>''));
	    $name = strtolower($name);
	    $name = str_replace(" ", "", $name);                                      // убираем пробелы
	    $name = str_replace("-", "", $name);                                      // убираем тире

	    
	    //Этап работы с длиной имени и расширения файла
	    $name_pieces = explode(".", $name); //разбили строку на части
	    
	    $count = count($name_pieces);

	    if ( $count>1 ) {
	      for ($i=1; $i<$count-2; $i++) {
	        $name_pieces[0] = $name_pieces[0].$name_pieces[$i];
	      }
	      $name_pieces[1] = $name_pieces[$count-1];
	    }
	      
	      
	    if (mb_strlen($name_pieces[1])>$extensMax) {
	        $name_pieces[1] = substr($name_pieces[1],0,$extensMax);                      //обрезали расширение, если больше 50символов
	    }
	  

	    if ( mb_strlen($name_pieces[0])+mb_strlen($name_pieces[1]) > $lenNameMax ) {     //обрезали основную часть
	        $name_pieces[0] = substr($name_pieces[0],0,$lenNameMax-mb_strlen($name_pieces[1]));
	    }


	    $name = $name_pieces[0].'.'.$name_pieces[1];
	    
	    return $name;
  	}



	
 }  

 
?>