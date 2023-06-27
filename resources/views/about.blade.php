   <x-layout>
    <x-slot name="title">
        <title>About</title>
    </x-slot>
            @foreach ($names as $name)
            
            <h3>
                <?= $name  ;?>
            </h3>
    
            @endforeach

    </x-layout>
   
     
