const testApi =  document.getElementById("test-api");

testApi.addEventListener("click", testApiCall);

async function testApiCall() {
    try {
        const response = await fetch("/api/hello");
        const data = await response.json();
        alert(data.message);
    } catch (error) {
        console.error("Erreur lors de l'appel à l'API :", error);
        testApi.textContent = "Erreur lors de l'appel à l'API";
    }
}