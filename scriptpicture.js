document.addEventListener('DOMContentLoaded', function() {
    const picBtn = document.getElementById('imgcamera');
    const picPanel = document.getElementById('menu-picture');
    const cropButton = document.getElementById('cropButton');
    const croppedImage = document.getElementById('croppedImage');

    // Controlar la visibilidad del menú
    let picVisible = false;
    let cropper;

    function toggleMenu() {
        picVisible = !picVisible;
        if (picVisible) {
            picPanel.style.top = '50%'; // Mostrar el menú centrado
            picPanel.style.transform = 'translate(-50%, -50%)'; // Centrar el menú
        } else {
            picPanel.style.top = '-700px'; // Esconder el menú por encima de la pantalla
        }
    }

    picBtn.addEventListener('click', () => {
        const input = document.createElement('input');
        input.type = 'file';
        input.accept = 'image/*';
        input.onchange = (e) => {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (event) => {
                    const img = new Image();
                    img.src = event.target.result;

                    img.onload = () => {
                        const scaleFactor = 300 / img.width;
                        const newHeight = img.height * scaleFactor;

                        croppedImage.src = event.target.result;
                        croppedImage.style.height = `${newHeight}px`;

                        if (cropper) {
                            cropper.destroy();
                        }

                        cropper = new Cropper(croppedImage, {
                            aspectRatio: 1,
                            viewMode: 1,
                            autoCropArea: 1,
                            responsive: true,
                            zoomable: false,
                            crop: function(event) {
                                const canvas = cropper.getCroppedCanvas({
                                    width: 300,
                                    height: 300
                                });
                                croppedImage.src = canvas.toDataURL();
                            },
                        });

                        croppedImage.addEventListener('wheel', function(event) {
                            event.preventDefault();
                        });

                        croppedImage.addEventListener('gesturestart', function(event) {
                            event.preventDefault();
                        });

                        // Mostrar el menú solo si no está visible
                        if (!picVisible) {
                            toggleMenu();
                        }
                    };
                };
                reader.readAsDataURL(file);
            }
        };
        input.click();
    });

    cropButton.addEventListener('click', () => {
        const canvas = cropper.getCroppedCanvas({ width: 300, height: 300 });
        const imageData = canvas.toDataURL();
        
        saveImage(imageData);

        // Cerrar el menú después de guardar la imagen
        toggleMenu();
    });
});

function saveImage(imageData) {
    $.ajax({
        url: 'saveImage.php',
        method: 'POST',
        data: { image: imageData },
        success: (response) => {
            console.log(response);
        },
        error: (error) => {
            console.error('Error:', error);
        },
    });
}

