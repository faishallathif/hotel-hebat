import axios from 'axios'

const request = axios.create({
  baseURL: 'http://localhost:8000/',
})

request.interceptors.request.use(
  request => {
    const user = JSON.parse( localStorage.getItem("user"))
    if (user) {
      request.headers.Authorization ="Bearer "+ user.token
    }
    return request
  },
  error => {
    return Promise.reject(error)
  }
)

export default request