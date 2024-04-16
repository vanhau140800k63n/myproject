
<script>
    const vision = require('@google-cloud/vision');

// Khởi tạo client của Google Cloud Vision
const client = new vision.ImageAnnotatorClient();

// Định nghĩa hàm đoán nội dung của ảnh
async function detectImageContent(fileName) {
    // Đọc nội dung của ảnh từ file
    const [result] = await client.labelDetection(fileName);
    const labels = result.labelAnnotations;
    console.log('Labels:');
    labels.forEach(label => console.log(label.description));
}

// Gọi hàm đoán nội dung của ảnh
detectImageContent('https://cdn-icons-png.flaticon.com/128/9217/9217611.png')
    .catch(err => {
        console.error('Error:', err);
    });
</script>