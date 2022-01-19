import React from 'react'
import Button from '@mui/material/Button'

interface Props {
  text: string
}

const ButtonForm: React.VFC<Props> = (props) => {
  return (
    <Button
      variant="contained"
      sx={{ borderRadius: 20, width: 90, ml: 'auto' }}
    >
      {props.text}
    </Button>
  )
}

export default ButtonForm
