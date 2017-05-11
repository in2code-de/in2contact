<?php
namespace In2code\In2contact\Controller;

use In2code\In2contact\Domain\Model\Contact;
use In2code\In2contact\Domain\Model\Transfer\FilterDto;
use In2code\In2contact\Domain\Repository\ContactRepository;
use TYPO3\CMS\Core\Messaging\AbstractMessage;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * ContactController
 */
class ContactController extends ActionController
{
    /**
     * @var ContactRepository
     */
    protected $contactRepository = null;

    /**
     * @param ContactRepository $contactRepository
     * @return void
     */
    public function injectContactRepository(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    /**
     * @return void
     */
    public function initializeListAction()
    {
        $this->allowFilterProperties();
    }

    /**
     * @param FilterDto|null $filter
     * @return void
     */
    public function listAction(FilterDto $filter = null)
    {
        $contacts = $this->contactRepository->findByFilter($filter);
        $this->view->assignMultiple(
            [
                'contacts' => $contacts,
                'filter' => $filter
            ]
        );
    }

    /**
     * @return void
     */
    public function initializeList2Action()
    {
        $this->allowFilterProperties();
    }

    /**
     * @param FilterDto|null $filter
     * @return void
     */
    public function list2Action(FilterDto $filter = null)
    {
        $contacts = $this->contactRepository->findByFilter($filter);
        $this->view->assignMultiple(
            [
                'contacts' => $contacts,
                'filter' => $filter
            ]
        );
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
        $this->addFlashMessage(
            'The object was created. Please be aware that this action is publicly accessible unless you implement an ' .
            'access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html',
            '',
            AbstractMessage::WARNING
        );
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
        $this->addFlashMessage(
            'The object was updated. Please be aware that this action is publicly accessible unless you implement an ' .
            'access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html',
            '',
            AbstractMessage::WARNING
        );
        $this->contactRepository->update($contact);
        $this->redirect('list');
    }

    /**
     * @param Contact $contact
     * @return void
     */
    public function deleteAction(Contact $contact)
    {
        $this->addFlashMessage(
            'The object was deleted. Please be aware that this action is publicly accessible unless you implement an ' .
            'access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html',
            '',
            AbstractMessage::WARNING
        );
        $this->contactRepository->remove($contact);
        $this->redirect('list');
    }

    /**
     * @return void
     */
    protected function allowFilterProperties()
    {
        $filterArgument = $this->arguments->getArgument('filter');
        $propertyMapping = $filterArgument->getPropertyMappingConfiguration();
        $propertyMapping->allowProperties('character');
    }
}
