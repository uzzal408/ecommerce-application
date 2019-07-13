<?php
namespace App\Traits;

/**
 * Trait FlashMessages
 * @package App\Traits
 */
trait FlashMessages{

    /**
     * @var array
     */
    protected $infoMessages = [];

    /**
     * @var array
     */
    protected $errorMessages = [];

    /**
     * @var array
     */
    protected $successMessage = [];

    /**
     * @var array
     */
    protected $warningMessages = [];


    /**
     * @param $message
     * @param $type
     */

    protected function setFlashMessage($message,$type){

        $model = 'infoMessages';

        switch ($type){

            case 'info': {
                $model = 'infoMessages';
            }
            break;

            case 'error': {
                $model = 'errorMessages';
            }
            break;

            case 'success': {
                $model = 'successMessages';
            }
            break;

            case 'waring': {
                $model = 'waringMessage';
            }
            break;


        }

        if (is_array($message)){
            foreach ($message as $key => $value){
                array_push($this->$model,$value);
            }
        }else{
            array_push($this->$model,$message);
        }

    }


    /**
     * @return array
     */

    protected function getFlashMessage(){
        return [
            'info'    => $this->infoMessages,
            'error'   => $this->errorMessages,
            'success' => $this->successMessage,
            'warning' => $this->warningMessages
        ];

    }


    /**
     * Flushing flash messages to Laravel's session
     */
    protected function showFlashMessage(){
        session()->flash('error', $this->errorMessages);
        session()->flash('info', $this->infoMessages);
        session()->flash('success', $this->successMessage);
    }

}
