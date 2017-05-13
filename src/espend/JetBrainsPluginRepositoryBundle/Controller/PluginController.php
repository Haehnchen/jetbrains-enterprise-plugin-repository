<?php

namespace espend\JetBrainsPluginRepositoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PluginController extends Controller
{
    /**
     * @Route("/plugins/{channel}/list", name="plugin_list", requirements={"channel": "stable"})
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request)
    {
        if ($request->query->get('build')) {
            $content = $this->get('espend_jet_brains_plugin_repository.factory.plugin_list_factory')->create(
                $this->getRepository()->findAll()
            );

            return new Response($content, 200, [
                'Content-Type' => 'application/xml',
            ]);
        }

        if ($pluginId = $request->query->get('pluginId')) {
            if ($plugin = $this->getRepository()->findOneById($pluginId)) {
                return new Response(
                    $this->get('espend_jet_brains_plugin_repository.factory.plugin_list_factory')->createPlugin($plugin),
                    200,
                    [
                        'Content-Type' => 'application/xml',
                    ]
                );
            }

            return new Response('Empty');
        }

        return new Response('Expected either `build` or `pluginId` parameters');
    }

    /**
     * @Route("/plugins/download/{updateId}", name="plugin_download")
     * @param Request $request
     */
    public function downloadAction(Request $request)
    {
        return new Response('foobar');
    }

    /**
     * @Route("/plugins/{pluginId}", name="plugin_show")
     * @param Request $request
     * @param string $pluginId
     * @return JsonResponse
     */
    public function showAction(Request $request, string $pluginId)
    {
        if (!$plugin = $this->getRepository()->findOneById($pluginId)) {
            throw $this->createNotFoundException();
        }

        return new JsonResponse(
            $this->get('serializer')->serialize($plugin, 'json')
        );
    }

    /**
     * @return \espend\JetBrainsPluginRepositoryBundle\Repository\PluginRepository|object
     */
    private function getRepository()
    {
        return $this->get('espend_jet_brains_plugin_repository.repository.plugin_repository');
    }
}
