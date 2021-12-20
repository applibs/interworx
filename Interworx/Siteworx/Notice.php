<?php

namespace Interworx\Siteworx;

use Interworx;

class Notice extends Interworx\WorxBase
{

    /**
     * Dismisses a banner notice
     *
     * @param int $delivery_id
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function dismissBanner(int $delivery_id)
    {
        $params = [
            'delivery_id' => $delivery_id
        ];

        return $this->parent->call('siteworx', '/notice', 'dismissBanner', $params);
    }

    /**
     * Ignore a notice until a certain time.
     *
     * @param array $delivery_id  int
     * @param int   $ignore_until (0, 1, 2, 3, 4, 5)
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function ignoreUntil(array $delivery_id, int $ignore_until)
    {
        $params = [
            'delivery_id'  => $delivery_id,
            'ignore_until' => $ignore_until
        ];

        return $this->parent->call('siteworx', '/notice', 'ignoreUntil', $params);
    }

    /**
     * Lists current banner notices.
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function listBannerNotices()
    {
        return $this->parent->call('siteworx', '/notice', 'listBannerNotices');
    }

    /**
     * Removes an unsubscription block for the current user
     *
     * @param int $code
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function removeUnsubscription(int $code)
    {
        $params = [
            'code' => $code
        ];

        return $this->parent->call('siteworx', '/notice', 'removeUnsubscription', $params);
    }

    /**
     * Unsubscribes the current user from a problem code.
     *
     * @param int $code
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function unsubscribe(int $code)
    {
        $params = [
            'code' => $code
        ];

        return $this->parent->call('siteworx', '/notice', 'unsubscribe', $params);
    }

    /**
     * Unsubscribe from all notices
     *
     * @return mixed
     * @throws Interworx\InterworxException
     * @version 6.1.9-1465
     */
    public function unsubscribeAll()
    {
        return $this->parent->call('siteworx', '/notice', 'unsubscribeAll');
    }

}