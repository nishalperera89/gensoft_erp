import axios from "axios";
import AppRoutes from "./utilities/routes/AppRoutes";

axios.defaults.baseURL = import.meta.env.VITE_API_BASE_URL;
axios.defaults.withCredentials = true;
axios.defaults.headers.post['content_type'] = 'application/json'
axios.defaults.headers.post['accept'] = 'application/json'

const App = () => {

  return (
    <>
      <AppRoutes />
    </>
  );
};

export default App;
