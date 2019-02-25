<?php

class Observable implements ObservableInterface
{
    /** @var ObserverInterface[] */
    private $followers = [];

    public function registerObserver(ObserverInterface $observer, int $priority): void
    {
        $follower = new Follower($observer, $priority);
        $this->followers[$follower->getUid()] = $follower;
    }

    public function notifyObservers(): void
    {
        $this->sortByPriority();
        $followers = $this->followers;
        /** @var array $observer */
        foreach ($followers as $follower)
        {
            $follower->update($this);
        }
    }

    public function removeObservers(ObserverInterface $observer): void
    {
        $uid = $observer->getUid();
        if (isset($this->followers[$uid]))
        {
            unset($this->followers[$uid]);
        }
    }

    private function sortByPriority()
    {
        usort($this->followers, function($lhs, $rhs) {
            /**
             * @var Follower $lhs
             * @var Follower $rhs
             */
            return $lhs->getPriority() < $rhs->getPriority();
        });
    }
}