<?php
namespace In2code\In2contact\Controller;

use In2code\In2contact\Domain\Model\Contact;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * ContactController
 */
class ContactController extends ActionController
{
    /**
     * @var \In2code\In2contact\Domain\Repository\ContactRepository
     * @inject
     */
    protected $contactRepository = null;

    /**
     * @return void
     */
    public function listAction()
    {
        $contacts = $this->contactRepository->findAll();
        $this->view->assign('contacts', $contacts);
    }

    /**
     * @return void
     */
    public function list2Action()
    {
        $contacts = $this->contactRepository->findAll();
        $this->view->assign('contacts', $contacts);
    }

    /**
     * @param Contact $contact
     * @return void
     */
    public function showAction(Contact $contact)
    {
        $this->view->assign('contact', $contact);
    }

    /**
     * @return void
     */
    public function newAction()
    {
    }

    /**
     * @param Contact $newContact
     * @return void
     */
    public function createAction(Contact $newContact)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->contactRepository->add($newContact);
        $this->redirect('list');
    }

    /**
     * @param Contact $contact
     * @ignorevalidation $contact
     * @return void
     */
    public function editAction(Contact $contact)
    {
        $this->view->assign('contact', $contact);
    }

    /**
     * @param Contact $contact
     * @return void
     */
    public function updateAction(Contact $contact)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->contactRepository->update($contact);
        $this->redirect('list');
    }

    /**
     * @param Contact $contact
     * @return void
     */
    public function deleteAction(Contact $contact)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->contactRepository->remove($contact);
        $this->redirect('list');
    }
}
