import React from 'react'
import {
  FormControl,
  Grid,
  Button,
  TextField,
  Dialog,
  DialogActions,
  DialogContent,
  DialogContentText,
  DialogTitle,
  Fab,
  Typography,
} from '@mui/material'
import AddIcon from '@mui/icons-material/AddCircleOutline'

interface Props {
  title: string
}

const LabelFormDialog: React.VFC<Props> = (props) => {
  const [isOpen, isSetOpen] = React.useState(false)

  const handleClickOpen = () => {
    isSetOpen(true)
  }

  const handleClose = () => {
    isSetOpen(false)
  }

  return (
    <>
      <Typography variant="h5" component="h2" mr={3}>
        {props.title}
      </Typography>
      <Fab onClick={handleClickOpen}>
        <AddIcon />
      </Fab>
      <Dialog open={isOpen} onClose={handleClose}>
        <DialogTitle>{props.title}を追加する</DialogTitle>
        <DialogContent>
          <DialogContentText>
            {props.title}を追加してください。
          </DialogContentText>
          <Grid container mt={1} spacing={2}>
            <Grid item xs={12} lg={3.2}>
              <FormControl variant="standard" fullWidth>
                <TextField
                  autoFocus
                  margin="dense"
                  label="ラベル名"
                  variant="outlined"
                />
              </FormControl>
            </Grid>
            <Grid item xs={12} lg={8.8}>
              <FormControl variant="standard" fullWidth>
                <TextField margin="dense" label="値" variant="outlined" />
              </FormControl>
            </Grid>
          </Grid>
        </DialogContent>
        <DialogActions>
          <Button onClick={handleClose}>キャンセル</Button>
          <Button onClick={handleClose}>追加する</Button>
        </DialogActions>
      </Dialog>
    </>
  )
}

export default LabelFormDialog
