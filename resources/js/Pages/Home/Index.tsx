import React from 'react'
import styles from '@/sass/Home.module.scss'
import Button from '@mui/material/Button'

const Home: React.VFC = () => {
  return (
    <>
      <p className={styles.test}>Home</p>
      <Button variant="contained">TEST</Button>
    </>
  )
}

export default Home
