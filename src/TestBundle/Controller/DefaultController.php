<?php

namespace TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TestBundle\Helper\File;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TestBundle:Default:index.html.twig');
    }



    public function page1Action()
    {
        $content = file($_SERVER['DOCUMENT_ROOT'].'/src/TestBundle/Controller/DefaultController.php');

        return $this->render('TestBundle:Default:page1.html.twig',
                             array('content' => $content,)
                            );
    }



    public function page2_1Action()
    {
        return $this->render('TestBundle:Default:page2.1.html.twig');
    }

    public function page2_2Action()
    {
        return $this->render('TestBundle:Default:page2.2.html.twig');
    }



    public function page3Action()
    {
        $oldname = "file is not exist";
        $newname = "file is not exist";

        if ($_FILES && $_FILES['filename']['error']== UPLOAD_ERR_OK) {
            
            $File = new File(200,50);
            $File->name = $_FILES['filename']['name'];

            $oldname = $File->name;
            
            $File->setName( $File->fileNameTransform($File->name) );
            
            $newname = $File->name;
        }

    
        return $this->render('TestBundle:Default:page3.html.twig',
                             array('oldname' => $oldname,
                                    'newname' => $newname,)
                            );
    }


    


}
