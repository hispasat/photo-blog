<?php

namespace Api\V1\Http\Controllers;

use Api\V1\Http\Resources\UserPlainResource;
use App\Managers\User\Contracts\UserManager;
use App\Models\User;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

/**
 * Class UsersController.
 *
 * @package Api\V1\Http\Controllers
 */
class UsersController extends Controller
{
    /**
     * @var ResponseFactory
     */
    private $responseFactory;

    /**
     * @var UserManager
     */
    private $userManager;

    /**
     * UsersController constructor.
     *
     * @param ResponseFactory $responseFactory
     * @param UserManager $userManager
     */
    public function __construct(ResponseFactory $responseFactory, UserManager $userManager)
    {
        $this->responseFactory = $responseFactory;
        $this->userManager = $userManager;
    }

    /**
     * @apiVersion 1.0.0
     * @api {post} /v1/users Create
     * @apiName Create
     * @apiGroup Users
     * @apiHeader {String} Accept application/json
     * @apiHeader {String} Content-type application/json
     * @apiParamExample {json} Request-Body-Example:
     * {
     *     "name": "username",
     *     "email": "username@domain.name",
     *     "password": "password"
     * }
     * @apiSuccessExample {json} Success-Response:
     * HTTP/1.1 201 Created
     * {
     *     "id": 1,
     *     "name": "username",
     *     "email": "username@mail.address",
     *     "role": "Customer",
     *     "created_at": "2016-10-24 12:24:33",
     *     "updated_at": "2016-10-24 14:38:05"
     * }
     */

    /**
     * Create a user.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $user = $this->userManager->create($request->all());

        return $this->responseFactory->json(new UserPlainResource($user), Response::HTTP_CREATED);
    }

    /**
     * @apiVersion 1.0.0
     * @api {get} /v1/users/:user_id Get
     * @apiName Get
     * @apiGroup Users
     * @apiHeader {String} Accept application/json
     * @apiParam {Integer{1...N}='me'} :user_id Unique resource ID.
     * @apiSuccessExample {json} Success-Response:
     * HTTP/1.1 20O OK
     * {
     *     "id": 1,
     *     "name": "username",
     *     "email": "username@mail.address",
     *     "role": "Customer",
     *     "created_at": "2016-10-24 12:24:33",
     *     "updated_at": "2016-10-24 14:38:05"
     * }
     */

    /**
     * Get a user.
     *
     * @param User $user
     * @return JsonResponse
     */
    public function get(User $user): JsonResponse
    {
        return $this->responseFactory->json(new UserPlainResource($user), Response::HTTP_OK);
    }

    /**
     * @apiVersion 1.0.0
     * @api {put} /v1/users/:user_id Update
     * @apiName Update
     * @apiGroup Users
     * @apiHeader {String} Accept application/json
     * @apiHeader {String} Content-type application/json
     * @apiParam {Integer{1...N}='me'} :user_id Unique resource ID.
     * @apiParamExample {json} Request-Body-Example:
     * {
     *     "name": "username",
     *     "email": "username@domain.name",
     *     "password": "password"
     * }
     * @apiSuccessExample {json} Success-Response:
     * HTTP/1.1 20O OK
     * {
     *     "id": 1,
     *     "name": "username",
     *     "email": "username@mail.address",
     *     "role": "Customer",
     *     "created_at": "2016-10-24 12:24:33",
     *     "updated_at": "2016-10-24 14:38:05"
     * }
     */

    /**
     * Update a user.
     *
     * @param Request $request
     * @param User $user
     * @return JsonResponse
     */
    public function update(Request $request, User $user): JsonResponse
    {
        $this->userManager->save($user, $request->all());

        return $this->responseFactory->json(new UserPlainResource($user), Response::HTTP_OK);
    }

    /**
     * @apiVersion 1.0.0
     * @api {delete} /v1/users/:user_id Delete
     * @apiName Delete
     * @apiGroup Users
     * @apiHeader {String} Accept application/json
     * @apiParam {Integer{1...N}='me'} :user_id Unique resource ID.
     * @apiSuccessExample {json} Success-Response:
     * HTTP/1.1 204 No Content
     */

    /**
     * Delete a user.
     *
     * @param User $user
     * @return JsonResponse
     */
    public function delete(User $user): JsonResponse
    {
        $this->userManager->delete($user);

        return $this->responseFactory->json(null, Response::HTTP_NO_CONTENT);
    }
}
