<?php
namespace Farmacia\Vacuna\Block;
use Magento\Customer\Model\Session;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;


class Step3 extends Template
{
    protected $customerSession;

    public function __construct(
        Context $context,
        Session $customerSession
    ) {
        parent::__construct($context);
        $this->customerSession = $customerSession;
    }
    public function generateFolio()
{
    $formData = $this->getFormData();
    $date = $formData['date']; // suponiendo que la fecha está en un campo llamado 'date' en vacuna_form_data
    $folio = 'F-' . date('Ymd', strtotime($date)) . '-' . rand(1000, 9999);
    return $folio;
}


    public function getFormData()
    {
        return $this->customerSession->getData('vacuna_form_data');
    }

    public function getFormData2()
    {
        return $this->customerSession->getData('vacuna_form_data_2');
    }
}
