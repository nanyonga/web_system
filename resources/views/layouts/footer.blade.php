


<footer class="footer">
    <div class="container-fluid">
        
    @auth( )
    <div class="d-flex justify-content-center">
        <div class="copyright mt-4 ml-1">
            <a href="{{ route('home') }}">BackHome</a>
        </div>
    </div>

</div>
    @endauth()

    @guest()
    <div class="copyright text-center align-center">

            <small>All Rights Reserved </small>
            
        </div>
    </div>
    @endguest()
    
</footer>
