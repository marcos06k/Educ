tailwind.config = {
    theme: {
        extend: {
        colors: {
            roxo: {
                claro: '#2E1065',
                escuro: '#1F1A24'           
            },
            fundo: {
                claro: '#F1F4F9',
                escuro: '#121212'
            },
        },
        fontFamily: {
            montserrat: ['Montserrat', 'sans-serif'],
            poppins: ['Poppins', 'sans-serif']
        },
        screens: {
            '2xl': {'max': '1535px'},
            // => @media (max-width: 1535px) { ... } notebook
      
            'xl': {'max': '1279px'},
            // => @media (max-width: 1279px) { ... }
      
            'lg': {'max': '1023px'},
            // => @media (max-width: 1023px) { ... }
      
            'md': {'max': '767px'},
            // => @media (max-width: 767px) { ... }
      
            'sm': {'max': '639px'},
            // => @media (max-width: 639px) { ... } celular

            'rs': {'min' : '767px'},
            // => @media (min-width: 767px) { ... }  tablet ou maior p responsividade

          }

        
      },
    }
}