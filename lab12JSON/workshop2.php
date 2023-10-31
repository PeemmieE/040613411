<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        async function getDataFromAPI() {
        let response = await fetch('https://data.go.th/dataset/296f32c6-8c7e-4a54-ade0-0913d35d3168/resource/d132638d-a243-4829-aed8-10ed4fad917f/download/priv_hos.json')
        let rawData = await response.text() // อ่านผลลพธั ์
        objectData = JSON.parse(rawData) // แปลผลลพธั ์เป็น object
        
        let result = document.getElementById('result') // ดงึ <ul> เพื่อใช้ในการเพมแท ิ่ ก็ <li>
        for (let i = 0; i < objectData.features.length; i++) {
            if(objectData.features[i].properties.num_bed<100){
                let content = objectData.features[i].properties.name + ', จำนวนเตียง ' + objectData.features[i].properties.num_bed
                let li = document.createElement('li') // สร้างแทก็ <li>
                li.innerHTML = content // นําข้อมูลทจี
                result.appendChild(li) // เพมแท ิ่ ก็ <li> ใหม่
            }
        
        }
        }
        getDataFromAPI() // เรียกฟังก์ชัน
    </script>
</head>

<body>
<ol id="result"></ol>
</body>
</html>