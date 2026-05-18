<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\NoticiaResource;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PublicNoticiaController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $perPage = min(max((int) $request->query('per_page', 10), 1), 50);

        $noticias = Noticia::query()
            ->publicadas()
            ->orderByDesc('publicado_em')
            ->orderByDesc('id')
            ->paginate($perPage);

        return NoticiaResource::collection($noticias);
    }

    public function show(string $slug): NoticiaResource
    {
        $noticia = Noticia::query()
            ->publicadas()
            ->where('slug', $slug)
            ->firstOrFail();

        return new NoticiaResource($noticia);
    }
}
