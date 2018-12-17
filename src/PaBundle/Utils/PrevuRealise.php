<?php
namespace PaBundle\Utils;

use Symfony\Component\DependencyInjection\ContainerInterface as Container;


class PrevuRealise 
{
    private $base_dir;

    public function __construct( $base_dir )
    {
        $this->base_dir = $base_dir;
    }

    public function index( $doctrine ):array
    { 
        $repository = $doctrine->getManager('PA')->getRepository('PaBundle:PrevuRealise');
        $listFiles = $repository->getAll();
        return $listFiles;
    }

    public function addImport( $request, $doctrine )
    {
        $date = $request->get('date');
        $file = $request->files->get('file');
        $pdf = $request->files->get('pdf');
        $extension = $request->get('extension');

        $name_file = str_replace( '/', '_', $date );

        $repository = $doctrine->getManager('PA')->getRepository('PaBundle:PrevuRealise');

        //Without or explicite extension by user form
        if( $extension!='' )
        {
            $repository->insert( $date, $name_file.'.'.$extension, $pdf.'.'.$extension );
            $file->move( $this->base_dir.'/web/export_public/Prevu_realise/PA', $name_file.'.'.$extension );
        }
        else{
            $repository->insert( $date, $name_file.'.'.$file->guessExtension(), $pdf.'.'.$pdf->guessExtension() );
            $file->move( $this->base_dir.'/web/export_public/Prevu_realise/PA', $name_file.'.'.$file->guessExtension() );
        }

       $pdf->move( $this->base_dir.'/web/export_public/Prevu_realise/PA', $name_file.'.'.$pdf->guessExtension() );
     }

    public function remove( $doctrine, $id, $file_name, $file_extension )
    {
        $repository = $doctrine->getManager('PA')->getRepository('PaBundle:PrevuRealise');
        $repository->remove( $id );

        if( $file_name != null )
        {
            try{
                unlink( $this->base_dir.'/web/export_public/Prevu_realise/PA/'. $file_name.'.'.$file_extension );
            }
            catch(Execption $e){}
            try{
                unlink( $this->base_dir.'/web/export_public/Prevu_realise/PA/'. $file_name.'.pdf' );
            }
            catch(Execption $e){}
        }
    }
}
