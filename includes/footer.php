    
    <div id="footer">
        <?php 
            echo 'Copyright' .date('y');
        ?>
    </div>
    </div>



<!-- optional JavaScript -->
    <!-- jquery first, then popper.js, the Bootstrap js -->
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $( function() {
                $( "#dob" ).datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange:"-100: +0",
                dateFormat:"yy-mm-dd"
               
            });
    } );
  </script>  
</body>
</html>