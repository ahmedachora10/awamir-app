@if ($media && $media->type->value == App\Http\Helpers\SocialMediaType::TELEGRAM->value)
    <x-web.telegram :link="$media->link" />
@elseif ($media && $media->type->value == App\Http\Helpers\SocialMediaType::WHATSAPP->value)
    <a href="{{ $media->link }}">
        <div class="fixed-icon shadow bg-success">
            <i class="bi bi-whatsapp text-white"></i>
        </div>
    </a>
@endif

<style>
    .fixed-icon {
        width: 55px;
        height: 55px;
        line-height: 55px;
        border-radius: 100%;
        position: fixed;
        bottom: 20px;
        right: 10px;
        color: white;
        text-align: center;
        font-size: 55px;
        background-color: white;
        cursor: pointer;
        z-index: 9999;
    }
</style>
