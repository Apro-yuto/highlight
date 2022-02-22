import React from 'react'
import {
  Button,
  TextField,
  Dialog,
  DialogActions,
  DialogContent,
  DialogContentText,
  DialogTitle,
} from '@mui/material'
import KeyboardArrowRightIcon from '@mui/icons-material/KeyboardArrowRight'

interface Props {
  title: string
}

const FormDialog: React.VFC<Props> = (props) => {
  const [isOpen, isSetOpen] = React.useState(false)

  const handleClickOpen = () => {
    isSetOpen(true)
  }

  const handleClose = () => {
    isSetOpen(false)
  }

  return (
    <>
      <Button
        onClick={handleClickOpen}
        endIcon={<KeyboardArrowRightIcon />}
        variant="contained"
      >
        {props.title}を追加する
      </Button>
      <Dialog open={isOpen} onClose={handleClose}>
        <DialogTitle>{props.title}名を追加する</DialogTitle>
        <DialogContent>
          <DialogContentText>
            {props.title}名を追加してください。
          </DialogContentText>
          <TextField
            autoFocus
            margin="dense"
            label={props.title + '名'}
            fullWidth
            variant="standard"
          />
        </DialogContent>
        <DialogActions>
          <Button onClick={handleClose}>キャンセル</Button>
          <Button onClick={handleClose}>追加する</Button>
        </DialogActions>
      </Dialog>
    </>
  )
}

export default FormDialog
