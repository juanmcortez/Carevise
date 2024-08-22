<footer>
    <section class="left">
        <x-logo />
        <span>{{ config('company.name') }}&nbsp;-&nbsp;&copy;&nbsp;{{ date('Y') }}</span>
    </section>
    <section class="right">
        <span>{{ config('company.address') }}&nbsp;&nbsp;{{ config('company.phone') }}</span>
        <a href="{{ config('company.github') }}" target="_blank">
            <box-icon type='logo' name='github'></box-icon>
        </a>
        <a href="{{ config('company.gitlab') }}" target="_blank">
            <box-icon type='logo' name='gitlab'></box-icon>
        </a>
        <a href="{{ config('company.instagram') }}" target="_blank">
            <box-icon type='logo' name="instagram"></box-icon>
        </a>
        <a href="{{ config('company.X') }}" target="_blank">
            <box-icon type='logo' name='twitter'></box-icon>
        </a>
        <a href="{{ config('company.facebook') }}" target="_blank">
            <box-icon name='facebook-circle' type='logo'></box-icon>
        </a>
    </section>
</footer>
