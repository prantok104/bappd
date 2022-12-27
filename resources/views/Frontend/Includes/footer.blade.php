 <footer class="bp-footer-area-start">
     <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <div class="bp-footer-contents py-3 px-2">
                     {{-- Footer left area start --}}
                     <div class="bp-left-part">
                         <p>&copy; 2022 Bangladesh Association of Parliament on Population and Development (BAPPD)</p>
                         <p>Sponsored by UNFPA supported SPCPD Project.</p>
                     </div>
                     {{-- Footer left area end --}}

                     {{-- Footer left area start --}}
                     <div class="bp-right-part">
                         <p><span>Social Link: </span> <a href=""><i class="fab fa-facebook"></i></a></p>
                         <p>Developed by: <a href="">Ezze Technology Ltd.</a></p>
                     </div>
                     {{-- Footer left area end --}}
                 </div>
             </div>
         </div>
     </div>
 </footer>

 {{-- jQuery --}}
 <script src="{{ asset('frontend/assets/js/jquery-1.10.2.min.js') }}"></script>

 {{-- Bootstrap js --}}
 <script src="{{ asset('frontend/assets/js/plugins/bootstrap.min.js') }}"></script>
 @stack('js')
 </body>

 </html>
